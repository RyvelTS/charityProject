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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/foundations/create', [App\Http\Controllers\FoundationController::class, 'create'])->name('create-foundation');
Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('profile');
Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-profile');
Route::post('/{id}/edit', [App\Http\Controllers\UserController::class, 'update'])->name('update-profile');
Route::get('/foundations/{foundation}', [App\Http\Controllers\FoundationController::class, 'show'])->name('foundation-page');