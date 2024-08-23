<?php

use App\Events\NewMessage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Jobs\SendWelcomeEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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



Route::middleware('guest')->group(function () {
    Route::view('/register', 'user.signup')->name('register');
    Route::post('/register-submit', [AuthController::class, 'register'])->name('register-submit');
    Route::view('/login','user.login')->name('login');
    Route::post('/login-submit', [AuthController::class, 'login'])->name('login-submit');

});


Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //////// posts //////////
    Route::resource('posts', PostsController::class);
    Route::get('blog-detail/{id}', [PostsController::class,'blogDetail'])->name('blog.detail');
});
