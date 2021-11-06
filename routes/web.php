<?php

use App\Http\Controllers\{
    CategoryController,
    HomeController,
    PackageController,
    UserController
};
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

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::resource('/packages', PackageController::class);
    Route::get('/vendors', [UserController::class, 'vendors'])->name('vendors');
    Route::get('/users', [UserController::class, 'users'])->name('users');

    Route::resource('/categories', CategoryController::class);
});

require __DIR__.'/auth.php';
