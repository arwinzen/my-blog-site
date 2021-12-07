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

    public function store(){
        // create the user
//        return (request()->all());
        $attributes = request()->validate([
            'name' => ['required', 'min: 3', 'max:255', ],
//            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            // alternatively can be written
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        // password is hashed in the user model under an eloquent mutator
//        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        // using the auth helper to log the user in
        auth()->login($user);

        // when the store function executes, initialise a flash message for successful acct creation
//        session()->flash('success', 'Your account has been created.');

        // alternatively we can modify the redirect to flash our message via the 'with' keyword
        return redirect('/')->with('success', 'Your account has been created.');
;

//        dd('success validation');
    }
}
