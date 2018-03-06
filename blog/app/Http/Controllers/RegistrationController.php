<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{

    public function create()
    {

        return view('registration.create');

    }

    public function store()
    {

        // Validate the form
        $this->validate(request(), [

            'name' => 'required|min:2|max:255',
            'email' => 'required|email|min:2|max:255',
            'password' => 'required|min:2|max:255|confirmed'

        ]);

        // Create and save the user
        //$user = User::create(request(['name', 'email', 'password']));
        $user = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => \Hash::make( request()->password )
        ]);

        // Sign them in
        auth()->login($user);

        // And then re-direct to the home page
        return redirect()->home();

    }
}
