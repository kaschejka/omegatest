<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\HTTP\Middleware\role;
use App\Http\Controllers\configController;
use App\Http\Controllers\uploadController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/upload', function () {
    return view('upload');
})->name('upload');


Route::middleware(['auth:sanctum', 'verified','role:admin'])->get('/config', function () {
    return view('config');
})->name('config');

Route::middleware(['auth:sanctum', 'verified','role:admin,user,manager'])->resource('users', usersController::class);
Route::middleware(['auth:sanctum', 'verified','role:admin'])->post('/config/submit', [configController::class,'addmanager']);
Route::middleware(['auth:sanctum', 'verified'])->post('/subupload', [uploadController::class,'fileupload']);
