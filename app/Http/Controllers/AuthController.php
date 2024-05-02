<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Models\User;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

   public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email', // Utiliser 'email' à la place de 'login'
            'mdp' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['mdp']], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Les informations d identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended(route('dashboard'));
    }
}
