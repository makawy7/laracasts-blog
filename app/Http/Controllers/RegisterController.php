<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:4|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:6'
        ]);

        $user = User::create($attributes);
        // Send the email notification to the admin
        $user->sendAdminNotification();
        auth()->login($user);
        // session()->flash('success', 'Your account has been created.');
        return redirect('/')->with('sucess', 'Your account has been created.');
    }
}
