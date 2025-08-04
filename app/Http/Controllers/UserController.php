<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingInformation = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:50'],
        ]);

        $incomingInformation['password'] = bcrypt($incomingInformation['password']);
        User::create($incomingInformation);


        return 'Erfolgreich registriert!';
    }
}
