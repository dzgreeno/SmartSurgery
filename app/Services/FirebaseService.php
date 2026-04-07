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
        $credData = null;

        // --- 1. Try FIREBASE_CREDENTIALS env var ---
        $credEnv = env('FIREBASE_CREDENTIALS');

        if ($credEnv) {
            $credEnv = trim($credEnv, " \t\n\r\0\x0B\"");

            // A) Check if it's a file path (doesn't start with '{' and contains path separators or .json)
            if (!str_contains($credEnv, '{') && (str_contains($credEnv, '/') || str_contains($credEnv, '\\'))) {
                // It's a file path — resolve relative to base_path()
                $filePath = $credEnv;
                if (!file_exists($filePath)) {
                    $filePath = base_path($credEnv);
                }
                if (!file_exists($filePath)) {
                    $filePath = storage_path($credEnv);
                }
                if (file_exists($filePath)) {
                    $credData = json_decode(file_get_contents($filePath), true);
                }
            }

            // B) Try base64 decode
            if (!$credData && !str_contains($credEnv, '{') && base64_decode($credEnv, true)) {
                $decodedString = base64_decode($credEnv);
                if ($decodedString) {
                    $credData = json_decode($decodedString, true);
                }
            }

            // C) Try direct JSON
            if (!$credData) {
                $credData = json_decode($credEnv, true);
            }
        }

        // --- 2. Fallback: try known file paths ---
        if (!$credData || !is_array($credData)) {
            $paths = [
                storage_path('app/firebase.json'),
                storage_path('firebase/firebase.json'),
                storage_path('app/smartsurgery-95e65-firebase-adminsdk-fbsvc-4bb9f6eba7.json'),
                base_path('firebase.json'),
            ];
            foreach ($paths as $path) {
                if (file_exists($path)) {
                    $credData = json_decode(file_get_contents($path), true);
                    if ($credData && is_array($credData)) {
                        break;
                    }
                }
            }
        }

        // --- 3. Apply credentials ---
        if ($credData && is_array($credData)) {
            if (isset($credData['private_key'])) {
                $credData['private_key'] = $this->cleanPrivateKey($credData['private_key']);
            }
            $factory = $factory->withServiceAccount($credData);
        }

        // --- 4. Set database URL ---
        $dbUrl = env('FIREBASE_DATABASE_URL', 'https://test-ae989-default-rtdb.europe-west1.firebasedatabase.app');
        $factory = $factory->withDatabaseUri($dbUrl);

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
     * Clean a private key string to ensure it's a valid PEM format for OpenSSL.
     * Handles keys from JSON files, env vars (with literal \n), and base64 encoded sources.
     */
    protected function cleanPrivateKey($key)
    {
        // 1. Convert ALL possible literal \n representations to actual newlines
        //    - '\\n' in single quotes = literal backslash + n (2 chars)
        //    - After json_decode, keys already have real newlines, but env vars might have literal \n
        $key = str_replace('\\n', "\n", $key);
        $key = str_replace('\r', '', $key);
        $key = trim($key);

        // 2. Strip the PEM headers/footers
        $cleanContent = str_replace('-----BEGIN PRIVATE KEY-----', '', $key);
        $cleanContent = str_replace('-----END PRIVATE KEY-----', '', $cleanContent);

        // 3. Remove ALL whitespace (newlines, spaces, tabs, carriage returns)
        $cleanContent = preg_replace('/\s+/', '', $cleanContent);

        // 4. Validate we have base64 content
        if (empty($cleanContent)) {
            return $key; // Return original if we can't parse
        }

        // 5. Rebuild proper PEM format with 64-char line wrapping
        $formatted = "-----BEGIN PRIVATE KEY-----\n"
                   . wordwrap($cleanContent, 64, "\n", true)
                   . "\n-----END PRIVATE KEY-----";

        return $formatted;
    }
}