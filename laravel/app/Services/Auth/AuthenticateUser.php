<?php


namespace App\Services\Auth;


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
//            ->createToken()
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
}
