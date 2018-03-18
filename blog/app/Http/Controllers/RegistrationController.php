<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{

    public function create()
    {

        return view('registration.create');

    }

    public function store(RegistrationForm $form)
    {

        // Create the user, sign them in, and send an email
        $form->persist();

        session()->flash('message', "Thanks so much for signing up!");

        // And then re-direct to the home page
        return redirect()->home();

    }
}
