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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'can:admin_panel',
    'namespace' => 'Admin'
], function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');

    Route::get('/users', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [\App\Http\Controllers\Admin\UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [\App\Http\Controllers\Admin\UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [\App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [\App\Http\Controllers\Admin\UsersController::class, 'update'])->name('users.update');
});

