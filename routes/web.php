<?php

use App\Http\Controllers\AuthTestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/auth-test', [AuthTestController::class, 'index'])
    ->name('auth.test');

Route::get('/auth-logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('auth.logout');

Route::get('/auth-manual-login', function () {
    return view('auth-test.login');
})->name('login.manual');

Route::post('/auth-manual-login', function (Request $request) {
    if (Auth::attempt($request->only('email','password'))) {
        return redirect('/auth-test');
    }

    return back()->withErrors(['email' => 'Connexion échouée']);
})->name('auth.manual.login');

Route::get('/logout-test', function () {
    Auth::logout();
    return redirect('/login');
});
Route::get('/profil', function () {
    return 'Profil utilisateur';
})->middleware('auth');
