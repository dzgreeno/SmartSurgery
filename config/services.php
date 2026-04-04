<?php

namespace App\Services;

use Kreait\Firebase\Factory;

class FirebaseService
{
    protected $auth;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(base_path('storage/app/firebase.json'));

        $this->auth = $factory->createAuth();
    }

    // جلب جميع المستخدمين
    public function getAllUsers()
    {
        $users = [];
        $list = $this->auth->listUsers();

        foreach ($list as $user) {
            $users[] = $user;
        }

        return $users;
    }
}