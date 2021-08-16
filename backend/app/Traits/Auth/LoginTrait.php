<?php

namespace App\Traits\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

/**
 * Trait para separar un poco las validaciones dentro del controlador Login
 */
trait LoginTrait
{
    public function checkUser($request)
    {
        $user = User::where('username', $request->username)->first();

        if (! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.'
            ]);
        }

        return $user;
    }
}
