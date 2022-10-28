<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users')->with('users', $users);
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('success', 'User successfully made administrator.');

        return redirect(route('users.index'));
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request,
            [
                'id' => 'bail|required|exists:users',
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        $user = User::find($validated['id']);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();
        return redirect(route('users.edit', $user->id));
    }
}

