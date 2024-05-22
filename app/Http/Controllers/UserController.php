<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'username' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => request()->get('username'),
            'email' => request()->get('email'),
            'password' => Hash::make(request()->get('password')),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect('/');
        }

        return redirect('/')->withErrors([
            'email' => 'No matching user found with the provided email and password',
        ]);
    }
}
