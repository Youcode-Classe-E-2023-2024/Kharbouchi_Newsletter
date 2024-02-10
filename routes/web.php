<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\MemberController;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'signin'])->name('signin.form');
Route::post('/login', [AuthController::class, 'signinPost'])->name('signin');

// Route::get('/admin', function () {
//     return view('dashboard');
// })->name('admin.dashboard');
Route::get('/admin', [AuthController::class, 'showUsers'])->name('admin.dashboard');



Route::get('/forget-password', function () {
    return view('Auth/forgotPassword'); 
})->name('forget_password');
Route::post('/forget-password', [ForgotPassword::class, 'forgotPasswordPost'])->name('forgot_password.post');


Route::get('/reset-password/{token}', [ForgotPassword::class, 'resetPassword'])->name('reset.password');


Route::post('/reset-password', [ForgotPassword::class, 'resetPasswordPost'])->name('reset.password.post');

Route::get('/admin', [MemberController::class, 'showMembers'])->name('admin.dashboard');
Route::get('/admin', [AuthController::class, 'showDashboard'])->name('admin.dashboard');


Route::post('/subscribe', [MemberController::class, 'store'])->name('subscribe.store');
