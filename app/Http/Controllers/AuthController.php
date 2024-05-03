<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return to_route('auth.login');
    }

    public function doLogin(Request $request){
        $identifiant = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($identifiant)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }
        return redirect()->route('auth.login')->with('danger', 'Vos identifiants sont incorect');
    }


}
