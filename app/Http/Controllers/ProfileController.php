<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Wyświetlanie profilu użytkownika
    public function showProfile()
    {
        // Wyświetlamy widok profilu
        return view('profile');
    }
}