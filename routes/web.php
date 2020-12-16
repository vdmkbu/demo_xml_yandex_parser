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

Route::group([
   'middleware' => 'auth'
], function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home/projects', [\App\Http\Controllers\ProjectController::class, 'index'])->name('projects');
    Route::get('/home/projects/create', [\App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
    Route::post('/home/projects', [\App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
});


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

    Route::get('/regions', [\App\Http\Controllers\Admin\RegionController::class, 'index'])->name('regions.index');
    Route::post('/regions/upload', [\App\Http\Controllers\Admin\RegionController::class, 'import'])->name('regions.import');
    Route::get('/regions/upload', [\App\Http\Controllers\Admin\RegionController::class, 'upload'])->name('regions.upload');
    Route::get('/regions/{region}/edit', [\App\Http\Controllers\Admin\RegionController::class, 'edit'])->name('regions.edit');
    Route::put('/regions/{region}', [\App\Http\Controllers\Admin\RegionController::class, 'update'])->name('regions.update');

});

