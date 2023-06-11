<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $userInput = $request->validate(
            [
                'name' => 'required',
                'email' => ['required', 'email'],
                'password' => 'required'
            ]
        );
        return 'register';
    }
}
