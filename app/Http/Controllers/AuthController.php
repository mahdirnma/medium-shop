<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function login(StoreLoginRequest $request){

    }
    public function registerForm(){
        return view('auth.register');
    }
    public function register(StoreRegisterRequest $request){
        $user=User::create($request->all());
        if($user){
            return to_route('login.form');
        }else{
            return to_route('register.form');
        }
    }
}
