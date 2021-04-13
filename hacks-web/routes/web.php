<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/settings', function () {
    return view('settings.usersettings');
});

Route::get('/route',function(){
    return view('routes.index');
});

Route::get('/institution',function(){
    return view('institution.institution');
});

Route::get('/', function () {
    return view('home');
});



Route::get('/', [\App\Http\Controllers\PagesController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\UserLoginController::class, 'logout'])->name('logout');
Route::get('/login', [App\Http\Controllers\UserLoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [App\Http\Controllers\UserLoginController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\UserRegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\UserRegisterController::class, 'create'])->name('createUser');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/documents', [App\Http\Controllers\DocsController::class, 'index']);
