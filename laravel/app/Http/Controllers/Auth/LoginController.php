<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginToken;
use App\Services\Auth\AuthenticateUser;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    private $auth;
    public function __construct(AuthenticateUser $auth)
    {
        $this->auth = $auth;
    }

    public function login(){
        return view('auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function loginHandler()
    {
        $this->auth->invite();
        // redirect
        return redirect()->route('welcome');
    }

    public function authenticate(LoginToken $token)
    {
        $this->auth->login($token);
        // redirect
        return redirect()->route('user');
    }

}
