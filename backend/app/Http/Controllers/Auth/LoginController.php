<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\Auth\LoginTrait;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    use LoginTrait;

    public function login(LoginRequest $request)
    {
        $user = $this->checkUser($request);

        $token = $user->createToken('access_interfell')->plainTextToken;

        return response(['access_token' => $token]);
    }
}
