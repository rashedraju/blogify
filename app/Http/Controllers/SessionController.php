<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionRequest;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('session.create');
    }

    public function store(SessionRequest $request){
        if ( !auth()->attempt( $request->validated() ) ) {
            throw ValidationException::withMessages( ['email' => 'email did not match'] );
        }

        return redirect( '/' )->with( 'Welcome back' );
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
