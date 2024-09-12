<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Wyświetlanie formularza logowania
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Obsługa logowania
    public function login(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Pobranie danych logowania
        $credentials = $request->only('email', 'password');
        
        // Próba zalogowania użytkownika
        if (Auth::attempt($credentials)) {
            // Jeśli logowanie się powiodło, przekierowanie do profilu
            return redirect()->intended('/profil');
        }

        // Jeśli logowanie się nie powiodło, powrót do formularza logowania z błędami
        return back()->withErrors([
            'email' => 'Błędny email lub hasło.',
        ]);
    }
}