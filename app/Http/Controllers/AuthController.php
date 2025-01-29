<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function login(Request $request){

    }
    public function registerForm(){
        return view('auth.register');
    }
}
