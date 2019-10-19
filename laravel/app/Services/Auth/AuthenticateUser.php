<?php


namespace App\Services\Auth;


use App\Models\LoginToken;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AuthenticateUser
{

    use ValidatesRequests;

    private $request;

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
//            ->send()
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
        $user = User::byEmail($this->request->email);
        // generate token
//        $user->generateToken();
        $token = LoginToken::generateToken($user);
dd($token);
        return $this;
    }
}
