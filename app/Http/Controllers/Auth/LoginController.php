<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('signout');
    }

    public function loginform() {
        // dd(Auth::check());
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' =>'required|email',
            'password' =>'required',
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'))
                             ->withSuccess('Login Success');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function signout() {
        Session::flush();
        Auth::logout();

        return redirect()->route('index');
    }

}
