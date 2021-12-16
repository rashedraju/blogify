<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(RegisterRequest $request){
        User::create( $request->validated() );

        return redirect( '/' )->with( 'success', 'Your account has been created' );
    }
}
