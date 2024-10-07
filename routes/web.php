<?php

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
