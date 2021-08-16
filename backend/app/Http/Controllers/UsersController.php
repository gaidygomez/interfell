<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users(Request $request)
    {
        $order = $request['order'] ?? 'id';
        
        return User::where('profession', 'like', "%{$request->profession}%")
            ->orderBy($order)
            ->get();
    }
}
