<?php


namespace App\Services\Auth;


use App\Models\LoginToken;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{

    use ValidatesRequests;

    private $request;
    private $user;
    private $token;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function invite()
    {
        // validate request
        $this->requestValidate()
        // create token
            ->createToken()
        // send to user
            ->send()
        ;
    }

    private function requestValidate()
    {
        $this->validate($this->request, [
            'email' => 'required|email|exists:users'
        ]);
        return $this;
    }

    private function createToken()
    {
        // find user
        $this->user = User::byEmail($this->request->email);
        // generate token
        return LoginToken::generateToken($this->user);
    }

    public function login(LoginToken $token)
    {
//        dd($token->user);
        // auth user
        Auth::login($token->user);
        // delete token
        $token->delete();
    }


}
