<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::get('/oferta', function () {
    return view('oferta');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Trasa wyświetlająca formularz logowania
Route::get('/logowanie', [AuthController::class, 'showLoginForm']);

// Trasa obsługująca logowanie
Route::post('/logowanie', [AuthController::class, 'login']);

// Trasa wyświetlająca profil użytkownika (dostępna tylko dla zalogowanych użytkowników)
Route::get('/profil', [ProfileController::class, 'showProfile'])->middleware('auth');

// Wyświetlanie formularza wysyłania wiadomości
Route::get('/email', function () {
    return view('email'); // Widok formularza wysyłania e-maili
});

// Wysłanie wiadomości
Route::post('/email/send', [MailController::class, 'sendEmail']);

require __DIR__.'/auth.php';