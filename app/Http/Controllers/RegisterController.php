<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public static function store(){
        //create the user
        $attributes = request()->validate([
            'name' => 'required|max:255',
            // 'username' => 'required|min:3|max:255|unique:users,username',
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            // 'email' => 'required|email|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|min:7|max:255'
        ]);

        $user = User::create($attributes);

        //create a session but dont want it to remain in the session so it will not show on next page load
        // session()->flash('success', 'Your account has been created');

        //log user in
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
