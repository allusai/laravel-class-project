<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    // The Auth::user() gets the current user and this can show them their
    // profile information.

    public function index()
    {
        return view('admin/profile', [
            'user' => Auth::user()
        ]);
    }
}
