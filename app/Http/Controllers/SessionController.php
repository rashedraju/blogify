<?php

namespace App\Http\Controllers;

use App\Services\SessionService;

class SessionController extends Controller
{
    protected $sessionService;

    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    public function create(){
        return view('session.create');
    }

    public function store(){
        $this->sessionService->login();

        return redirect( '/' )->with( 'Welcome back' );
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
