<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerform() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:6'
        ]);

        $data = $request->all();
        
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->route('index');
    }
}
