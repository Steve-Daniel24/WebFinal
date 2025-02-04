<?php

namespace app\controllers;

use Flight;
use app\models\User;

class AuthController {
    public function showLoginForm() {
        Flight::render('auth/login');
    }

    public function login() {
        $email = Flight::request()->data->email;
        $password = Flight::request()->data->password;
        
        $user = User::authenticate($email, $password);
        
        if ($user) {
            $_SESSION['user'] = $user;
            Flight::redirect('/');
        } else {
            Flight::render('auth/login', ['error' => 'Identifiants invalides']);
        }
    }

    public function showRegisterForm() {
        Flight::render('auth/register');
    }

    public function register() {
        $data = Flight::request()->data;
        
        if (User::create($data)) {
            Flight::redirect('/login');
        } else {
            Flight::render('auth/register', ['error' => 'Erreur lors de l\'inscription']);
        }
    }

    public function logout() {
        session_destroy();
        Flight::redirect('/login');
    }
} 