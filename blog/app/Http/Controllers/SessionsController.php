<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        // validate request
        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // check if invalid credentials are passed
        if (!auth()->attempt($attributes)){
            // will redirect to login page with the error message displayed
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }

        // if successfully authenticated
        // prevent session fixation
        session()->regenerate();

        //redirect with a success flash message
        return redirect('/')->with('success', "Welcome back, " . auth()->user()->name . ".");
    }

    public function destroy(){
//        dd('log the user out');

        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
