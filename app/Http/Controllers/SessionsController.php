<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create(){
        return view('sessions.create');
    }

    public function store(){
        //validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //attempt to authenticate and log in the user
        //confirms you have given the correct password and email
        if(! auth()->attempt($attributes)){
            //auth failed 2 WAYS
            //sends an error message to the front end and it will show up on the screen under the input fields
            //1st WAY
            // return back()
            // ->withInput()
            // ->withErrors(['email' => 'Your provided credentials could not be verified']);

            //2nd WAY
            throw ValidationException::withMessages(
                ['email' => 'Your provided credentials could not be verified']
            );
        }

        //starts a new session id to protect the user from hackers
        session()->regenerate();

        //redirect with a success flash message
        return redirect('/')->with('success', 'Welcome Back');
    }

    public function destroy(){

        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
