<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['email' => 'Can\'t added the email address to newsletter']);
        }

        return redirect('/')->with('success', 'You\'re subscribed to our newsletter.');
    }
}

