<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            'ProfileImage' => 'image',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);
        if (isset($attributes['ProfileImage'])) {
            $attributes['ProfileImage'] = request()->file('ProfileImage')->store('ProfileImage');
        }else{
            ddd(request()->file);
        }
        User::create($attributes);

        return redirect('/login')->with('success', 'Your account has been created 🥳 ');;
    }
}
