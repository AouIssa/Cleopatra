<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }
}