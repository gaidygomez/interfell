<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'unique:App\Models\User,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        User::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password'])
        ]);

        return response(['success' => 'User has been created']);
    }
}
