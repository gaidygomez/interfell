<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users(Request $request)
    {
        $request->validate([
            'order' => ['in:id,age,last_name', 'nullable'],
            'profession' => ['string', 'nullable'],
        ]);
        
        $order = $request->order ?? 'id';
        $profession = $request->profession ?? '';

        return User::where('profession', 'like', "%{$profession}%")
            ->orderBy($order)
            ->get();
    }

    public function edit(EditRequest $request)
    {
        User::where('id', $request->id)->update([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'profession' => $request['profession'],
            'dni' => $request['dni'],
            'age' => $request['age'],
        ]);
        
        return response(['success' => 'User has been updated']);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required', 'numeric','exists:App\Models\User,id']
        ]);

        User::where('id', $request->id)->delete();

        return response(['success' => 'User has been deleted']);
    }
}
