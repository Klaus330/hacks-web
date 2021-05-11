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

Route::get('/user/settings', [\App\Http\Controllers\UserController::class, 'settings']);

Route::get('/route', function () {
    return view('routes.index');
});

Route::get('/institution', function () {
    return view('institution.institution');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/admin/documents', function () {
    return view('admin.documents');
});

Route::get('/admin/institutions', function () {
    return view('admin.institutions');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});


Route::get('/', [\App\Http\Controllers\PagesController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\UserLoginController::class, 'logout'])->name('logout');
Route::get('/login', [App\Http\Controllers\UserLoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [App\Http\Controllers\UserLoginController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\UserRegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\UserRegisterController::class, 'create'])->name('createUser');

Route::get('/documents', [App\Http\Controllers\DocsController::class, 'index']);

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store']);

Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index']);
Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store']);

Route::get('/get-departments', [App\Http\Controllers\InstitutionsController::class, 'getDepartmentsList']);
Route::get('/get-docs', [App\Http\Controllers\DocsController::class, 'getProssesList']);

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/get-reviews', [App\Http\Controllers\ReviewController::class, 'getReview']);
Route::post('/delete-reviews', [App\Http\Controllers\ReviewController::class, 'deleteReview']);
Route::get('/refresh-info' ,[App\Http\Controllers\AdminController::class,'refresh']);

Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'store']);

// Institutions
Route::get('/get-institutions', [\App\Http\Controllers\InstitutionsController::class, 'getInstitutionsList']);
Route::get('/get-institution-by-name', [App\Http\Controllers\InstitutionsController::class, 'getInstitutionByName']);

Route::get('/get-route', [\App\Http\Controllers\RoutesController::class, 'getRoute']);


Route::get('/get-process-by-name', [\App\Http\Controllers\DocsController::class, 'getProcessByName']);

Route::get('/get-process-by-institution', [App\Http\Controllers\DocsController::class, 'getProcessDetailsByInstitution']);
Route::post('/update-institution-data', [App\Http\Controllers\InstitutionsController::class, 'updateInstitutionDetails']);
Route::post('/update-process-data', [App\Http\Controllers\DocsController::class, 'updateProcessDetails']);



