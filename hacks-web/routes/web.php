<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin/documents', function () {
    return view('admin.components.documents');
});

Route::get('/admin/institutions', function () {
    return view('admin.components.institutions');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/documents', [App\Http\Controllers\DocsController::class, 'index']);

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index']);
