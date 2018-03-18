<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\WelcomeAgain;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|min:2|max:255|unique:users,email',
            'password' => 'required|min:2|max:255|confirmed'
        ];
    }

    public function persist()
    {

        // Create and save the user
        $user = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => \Hash::make( request()->password )
        ]);

        // Sign them in
        auth()->login($user);

        \Mail::to($user)->send(new \App\Mail\WelcomeAgain($user));

    }
}
