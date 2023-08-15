<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

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

Route::get('/sso/login', [App\Http\Controllers\SSO\SSOController::class, 'getLogin'])->name('sso.login');
Route::get('/callback', [App\Http\Controllers\SSO\SSOController::class, 'getCallback'])->name('sso.callback');
Route::get('/sso/connect', [App\Http\Controllers\SSO\SSOController::class, 'connectUser'])->name('sso.connect');