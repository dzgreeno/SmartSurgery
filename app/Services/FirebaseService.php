<?php

namespace App\Services;

use Kreait\Firebase\Factory;

class FirebaseService
{
    protected $factory;
    protected $auth;
    protected $firestore;

    public function __construct()
    {
        $factory = new Factory();
        $credPath = storage_path('app/firebase.json');
        $credJson = env('FIREBASE_CREDENTIALS');

        if ($credJson) {
            // Aggressively clean the string (remove whitespace and wrapping quotes)
            $credJson = trim($credJson, " \t\n\r\0\x0B\"");
            
            // Handle Base64 encoded JSON
            if (!str_contains($credJson, '{') && base64_decode($credJson, true)) {
                $decodedString = base64_decode($credJson);
                if ($decodedString) {
                    $credJson = $decodedString;
                }
            }

            $decoded = json_decode($credJson, true);
            
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                // Critical Fix for Vercel/Heroku: Replace literal '\n' characters with actual newlines for OpenSSL
                if (isset($decoded['private_key'])) {
                    $decoded['private_key'] = str_replace('\\n', "\n", $decoded['private_key']);
                }
                $factory = $factory->withServiceAccount($decoded);
            } else {
                // If it still fails, and we are in debug mode, throw a more descriptive error
                if (config('app.debug')) {
                    $error = json_last_error_msg();
                    $preview = substr($credJson, 0, 30);
                    throw new \RuntimeException("Firebase JSON Error: $error. Data starts with: $preview");
                }
            }
        } elseif (file_exists($credPath)) {
            // Load from Local File (if exists)
            $factory = $factory->withServiceAccount($credPath);
        }

        $this->factory = $factory;
    }

    public function getAuth()
    {
        if (!$this->auth && $this->factory) {
            $this->auth = $this->factory->createAuth();
        }

        if (!$this->auth) {
            throw new \RuntimeException('Firebase Auth not available. Check credentials file.');
        }

        return $this->auth;
    }

    public function getFirestore()
    {
        if (!$this->firestore && $this->factory) {
            $this->firestore = $this->factory->createFirestore()->database();
        }

        if (!$this->firestore) {
            throw new \RuntimeException('Firestore not available. Check credentials file.');
        }

        return $this->firestore;
    }
}