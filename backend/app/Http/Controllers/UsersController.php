<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function users(Request $request)
    {
        $request->validate([
            'order' => ['in:id,age,last_name', 'nullable'],
            'profession' => ['string', 'nullable'],
            'asc' => ['in:asc,desc']
        ]);
        
        $order = $request->order ?? 'id';
        $profession = $request->profession ?? '';

        return User::where('profession', 'like', "%{$profession}%")
            ->orderBy($order, $request['asc'])
            ->get();
    }

    public function dni(Request $request)
    {
        $request->validate([
            'dni' => ['required', 'string']
        ]);

        return User::where('dni', $request['dni'])
            ->get();
    }

    public function create(CreateRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'profession' => $request['profession'],
            'dni' => $request['dni'],
            'age' => $request['age'],
            'username' => $request['username'],
            'password' => Hash::make($request['password'])
        ]);

        return response(['success' => 'User Created']);
    }

    public function edit(EditRequest $request)
    {
        User::where('id', $request->id)->update([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'profession' => $request['profession'] ?? '',
            'dni' => $request['dni'] ?? '',
            'age' => $request['age'],
        ]);
        
        return response(['success' => 'User has been updated']);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'numeric','exists:App\Models\User,id']
        ]);

        $logout = false;

        if ($request['id'] == auth()->user()->id) {
            auth()->user()->tokens()->delete();

            $logout = true;
        }

        User::where('id', $request->id)->delete();

        return response(['success' => 'User has been deleted', 'logout' => $logout]);
    }
}
