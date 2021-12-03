<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('session.create');
    }

    public function store(){
        $attributes = request()->validate([
           'email' => ['required', 'email', Rule::exists('users', 'email')],
           'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            return redirect('/')->with('Welcome back');
        }

        throw ValidationException::withMessages(['email' => 'email did not match']);
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
