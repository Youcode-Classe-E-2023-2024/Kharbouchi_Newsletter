<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get(
    '/home',
    function () {
        return view('home');
});
Route::controller(authController::class)->group(function (){
    Route::get('register','register')->name('register');
});
Route::post('/register',[authController::class,'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'signin'])->name('signin.form');
Route::post('/login', [AuthController::class, 'signinPost'])->name('signin');
Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    return view('dashboard');
})->name('dashboard');

