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

Route::get(
    '/home',
    function () {
        return view('home');
});
// Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'signin'])->name('signin.form');
Route::post('/login', [AuthController::class, 'signinPost'])->name('signin');
Route::get('/admin' ,function (){
    return view('dashboard');
});
Route::get('/forget_password', function () {
        return view('Auth/forgotPassword');
});
