<?php

namespace App\Http\Controllers;

use App\Services\RegisterService;

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function create(){
        return view('register.create');
    }

    public function store(){
        $this->registerService->createUser();

        return redirect( '/' )->with( 'success', 'Your account has been created' );
    }
}
