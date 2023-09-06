<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\UserController;


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
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login']);


Route::get('/password/reset', [ResetPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ResetPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'auth'], function () {

Route::get('/index', function () {
    return view('index');
});
Route::get('/Teacher', [UserController::class,'Teacher']);
Route::post('/Teacher/store', [UserController::class,'addTeacher']);
Route::delete('/Teacher/delete', [UserController::class,'destroyTeacher']);
Route::post('/Teacher/update', [UserController::class,'updateTeacher']);



Route::get('/Student', [UserController::class,'Student']);
Route::post('/Student/store', [UserController::class,'addStudent']);
Route::delete('/Student/delete', [UserController::class,'destroyStudent']);
Route::post('/Student/update', [UserController::class,'updateStudent']);


Route::get('/Profile', [UserController::class,'Profile']);
Route::post('/Profile/update', [UserController::class,'updateProfile']);
});








