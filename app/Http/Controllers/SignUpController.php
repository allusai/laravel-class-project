<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class SignUpController extends Controller
{
    //Handles the signing up process and authentication

    public function index()
    {
        return view('signup');
    }

    public function signup()
    {
        $user = new User();
        $user->email = request('email'); // Cool way of getting Post parameter
        $user->password = Hash::make(request('password')); //We can encrypt the password using bcrypt!
        $user->save();

        Auth::login($user);
        return redirect('/profile');

        // return redirect('/login');
    }
}
