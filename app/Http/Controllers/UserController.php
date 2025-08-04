<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingInformation = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:50'],
        ]);

        $incomingInformation['password'] = bcrypt($incomingInformation['password']);
        $user = User::create($incomingInformation);
        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request) {
        $incomingInformation = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required',
        ]);

        if (auth()->attempt([
            'email' => $incomingInformation['loginemail'], 
            'password' => $incomingInformation['loginpassword']
        ])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
