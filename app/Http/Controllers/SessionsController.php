<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'You\'ve been logged out.');
    }
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back, ' . auth()->user()->name);
        }
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Email or password is not correct!']);
        throw ValidationException::withMessages(['email' => 'Email or password is not correct!']);
    }
}
