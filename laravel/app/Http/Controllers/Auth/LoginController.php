<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginToken;
use App\Services\Auth\AuthenticateUser;

class LoginController extends Controller
{

    public function login(){
        return view('auth.login');
    }

    public function loginHandler(AuthenticateUser $auth)
    {
        $auth->invite();
        // redirect
        return 'loginHandler';
    }

    public function authenticate(LoginToken $token)
    {
        dd($token);
    }

}
