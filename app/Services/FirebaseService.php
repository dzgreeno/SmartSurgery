<?php

namespace App\Services;

use Kreait\Firebase\Factory;

class FirebaseService
{
    protected $factory;
    protected $auth;
    protected $database;
    protected $firestore;

    public function __construct()
    {
        $factory = new Factory();
        $credPath = storage_path('app/firebase.json');
        $credJson = env('FIREBASE_CREDENTIALS');

        if ($credJson) {
            $credJson = trim($credJson, " \t\n\r\0\x0B\"");
            
            if (!str_contains($credJson, '{') && base64_decode($credJson, true)) {
                $decodedString = base64_decode($credJson);
                if ($decodedString) {
                    $credJson = $decodedString;
                }
            }

            $decoded = json_decode($credJson, true);
            
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                if (isset($decoded['private_key'])) {
                    $decoded['private_key'] = $this->cleanPrivateKey($decoded['private_key']);
                }
                $factory = $factory->withServiceAccount($decoded);
            } else {
                if (config('app.debug')) {
                    $error = json_last_error_msg();
                    $preview = substr($credJson, 0, 30);
                    throw new \RuntimeException("Firebase JSON Error: $error. Data starts with: $preview");
                }
            }
        } elseif (file_exists($credPath)) {
            $credData = json_decode(file_get_contents($credPath), true);
            if (isset($credData['private_key'])) {
                $credData['private_key'] = $this->cleanPrivateKey($credData['private_key']);
            }
            $factory = $factory->withServiceAccount($credData);
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

    public function getDatabase()
    {
        if (!$this->database && $this->factory) {
            $this->database = $this->factory->createDatabase();
        }

        if (!$this->database) {
            throw new \RuntimeException('Firebase Realtime Database not available. Check credentials file.');
        }

        return $this->database;
    }

    /**
     * Clean a private key string to ensure it's a valid PEM format for OpenSSL
     */
    protected function cleanPrivateKey($key)
    {
        $key = str_replace('\\n', "\n", $key);
        $key = trim($key);
        
        $cleanContent = preg_replace('/-----BEGIN PRIVATE KEY-----/', '', $key);
        $cleanContent = preg_replace('/-----END PRIVATE KEY-----/', '', $cleanContent);
        $cleanContent = preg_replace('/\s+/', '', $cleanContent);
        
        $key = "-----BEGIN PRIVATE KEY-----\n"
             . chunk_split($cleanContent, 64, "\n")
             . "-----END PRIVATE KEY-----\n";

        return trim($key);
    }
}