<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');

// Posts Routes
Route::resource('posts', PostController::class);

// User Posts Routes
Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');

// Routes for authentificated users
Route::middleware('auth')->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index'
    ])->middleware('verified')->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'
    ])->name('logout');

    // Email Verification routes
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'
    ])->name('verification.notice');

    // Email verification handler route 
    Route::get('/email/verify/{id}/{hash}', [ AuthController::class, 'verifyEmail'
    ])->middleware(['signed'])->name('verification.verify');

    // Resending the Verification Email
    Route::post('/email/verification-notification', [ AuthController::class, 'verifyHandler'
    ])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

});


// Routes for guest users 
Route::middleware('guest')->group(function() {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register',  [AuthController::class, 'register']);
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login',  [AuthController::class, 'login']);
});