<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autenticacao\CadastroController;
use App\Http\Controllers\Autenticacao\LoginController;
use App\Http\Controllers\Autenticacao\LogoutController;
use App\Http\Controllers\UrlsController;
use Illuminate\Auth\Events\Logout;

Route::get('/', [UrlsController::class, 'index']);

Route::get('/urls', [UrlsController::class, 'index'])->name('urls');
Route::post('/urls', [UrlsController::class, 'store']);

Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro');
Route::post('/cadastro', [CadastroController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/logout', [LoginController::class, 'index']);