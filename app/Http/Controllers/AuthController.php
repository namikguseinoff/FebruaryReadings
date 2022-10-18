<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function Login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration() {
        return view('register');
    }

    public function save(Request $request) {
        if (Auth::check()) {
            return redirect(route('home'));
        }

        $validateFields = $request->validate([
            'username' => 'required|min:8|max:64',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])/',
            're-password' => 'required|same:password',
        ]);

        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user);
            return redirect(route('home'));
        }
        return redirect(route('login'))->withErrors([
            'formError' => 'Error occured while registration user'
        ]);
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
