<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\RegisterSuccessNotification;
use Illuminate\Validation\Rule;

class RegisterService {
    public $visibilityService;

    public function __construct(VisibilityService $visibilityService)
    {
        $this->visibilityService = $visibilityService;
    }

    public function createUser() {
        $attributes = request()->validate( [
            'name'     => ['required', 'min:6', 'max:255'],
            "username" => ['required', 'min:6', 'max:255', Rule::unique( 'users', 'username' )],
            'email'    => ['required', 'email', 'max:255', Rule::unique( 'users', 'email' )],
            'password' => ['required', 'min:6', 'max:255']
        ] );

        $user = User::create( $attributes );
        $this->visibilityService->create( $user );

        // Notify User
        $user->notify( new RegisterSuccessNotification( [
            'name' => $user->name
        ] ) );

        auth()->login( $user );
    }
}
