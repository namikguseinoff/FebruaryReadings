<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller {
    public function save(Request $request) {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }

        $validateFields = $request->validate([
            'name' => 'required|name',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user);
            return redirect(route('user.private'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError' => 'Error occured while registration user'
        ]);
    }
}
