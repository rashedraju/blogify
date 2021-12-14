<?php

namespace App\Services;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionService {
    public function login() {
        $attributes = request()->validate( [
            'email'    => ['required', 'email', Rule::exists( 'users', 'email' )],
            'password' => 'required'
        ] );

        if ( !auth()->attempt( $attributes ) ) {
            throw ValidationException::withMessages( ['email' => 'email did not match'] );
        }

    }
}
