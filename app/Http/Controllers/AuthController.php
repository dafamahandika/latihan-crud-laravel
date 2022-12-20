<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function indexRegister() {
        return view('register.index');
    }

    public function storeRegister(Request $request) {
        $register = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'confirm-password' => ['required', 'min:8'],
        ]);

        if ($register['confirm-password'] == $register['password']) {
            
            $register ['password'] = bcrypt($register['password']);
            
            User::create([
                'name' => $register['name'],
                'email' => $register['email'],
                'password' => $register['password'],
            ]);

            return redirect('/login')->with('success', 'Register Berhasil, Silahkan Login');
        } else {
            return redirect('/register')->with('error', 'Password and Confirm Password do not match');
        }
        
    }

    public function indexLogin() {
        return view('login.index');
    }

    public function storeLogin(Request $request) {
        $login = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->with('loginError', 'Login Error, Email atau Password tidak sesuai');
    }

    public function logout(Request $request) {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect('login');
    }
}
