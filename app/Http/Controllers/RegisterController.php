<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Services\VisibilityService;

class RegisterController extends Controller
{
    public function __construct(VisibilityService $visibilityService)
    {
        $this->visibilityService = $visibilityService;
    }

    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
           'name' => ['required', 'min:6', 'max:255'],
           "username" => ['required', 'min:6', 'max:255', Rule::unique('users', 'username')],
           'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
           'password' => ['required', 'min:6', 'max:255']
        ]);

        $user = User::create($attributes);
        $this->visibilityService->create($user);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
