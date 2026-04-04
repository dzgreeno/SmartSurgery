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
        $credPath = storage_path('app/firebase.json');

        if (file_exists($credPath)) {
            $this->factory = (new Factory)
                ->withServiceAccount($credPath);
        }
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