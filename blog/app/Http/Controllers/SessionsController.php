<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {

        // Add a guest filter, and only allow guest to execute
        $this->middleware('guest', ['except' => 'destroy']);

    }

    public function create()
    {

        return view('sessions.create');

    }

    public function store()
    {

        // Attempt to authenticate the user
        if (! auth()->attempt(request(['email', 'password'])) ) {
            // If not, redirect back()
            return back()->withErrors([
                'message' => 'Please check your credentials and try again!'

            ]);

        };

        // auth()->attempt logs the user in

        // Redirect to the home page
        return redirect()->home();

    }

    public function destroy()
    {

        auth()->logout();

        return redirect()->home();

    }

}
