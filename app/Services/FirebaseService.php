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
            // Load from Environment Variable (JSON String)
            // Trim any accidental whitespace or hidden characters
            $credJson = trim($credJson);
            
            $decoded = json_decode($credJson, true);
            
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $factory = $factory->withServiceAccount($decoded);
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