<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function login(StoreLoginRequest $request){
        $myData = $request->only('email', 'password');
        if(Auth::attempt($myData)){
            return to_route('dashboard');
        }else{
            return redirect()->back();
        }
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
    public function logout(){
        Auth::logout();
        return to_route('login.form');
    }
}
