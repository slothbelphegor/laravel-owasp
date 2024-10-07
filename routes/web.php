<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VulnerabilityController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/vulnerabilities/sql-injection', [VulnerabilityController::class, 'sqlInjection'])->name('sqlInjection');
Route::get('/vulnerabilities/xss', function () {
    return view('vulnerabilities.xss');
})->name('xss.form');

Route::post('/vulnerabilities/xss', [VulnerabilityController::class, 'xss'])->name('xss.submit');
Route::get('/vulnerabilities/csrf', function () {
    return view('vulnerabilities.csrf'); // GET route to show the form
})->name('csrf.form');

Route::post('/vulnerabilities/csrf', [VulnerabilityController::class, 'csrf'])->name('csrf.submit');
Route::get('/vulnerabilities/idor', [VulnerabilityController::class, 'idor'])->name('idor');
Route::post('/vulnerabilities/rce', [VulnerabilityController::class, 'rce'])->name('rce');
Route::get('/vulnerabilities/rce', function () {
    return view('vulnerabilities.rce');
})->name('rce.form');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Add other protected routes here
});

Route::get('/', [HomeController::class, 'index'])->name('home');