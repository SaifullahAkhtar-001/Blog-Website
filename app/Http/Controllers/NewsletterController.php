<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function setSubscriber(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This Email could not be register for some reason 😞 '
            ]);
        }

        return redirect('/')->with('success', 'You are successfully subscribed for newsletter 🎉');
    }
}
