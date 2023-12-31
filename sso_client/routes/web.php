<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\SSO\SSOController;

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

//Route::get('/', function () { return view('welcome'); });

Route::get('/sso/login', [SSOController::class, 'getLogin']
)->name('sso.login');

Route::get('/callback', [SSOController::class, 'getCallback']
)->name('sso.callback');

Route::get('/sso/authuser', [SSOController::class, 'authUser']
)->name('sso.authuser');

Auth::routes(['register' => false,'reset' => false,]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']
)->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']
)->name('index');
