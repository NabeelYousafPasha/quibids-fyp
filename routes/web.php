<?php

use App\Http\Controllers\{AuctionController, CategoryController, HomeController, PackageController, UserController};
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

    // package
    Route::resource('/packages', PackageController::class);

    // vendor
    Route::get('/vendors', [UserController::class, 'vendors'])->name('vendors');

    // user
    Route::get('/users', [UserController::class, 'users'])->name('users');

    // category
    Route::resource('/categories', CategoryController::class);

    // auction
    Route::get('/auctions/{auction}/media', [AuctionController::class, 'listMedia'])->name('auctions.media');
    Route::post('/auctions/{auction}/media', [AuctionController::class, 'uploadMedia'])->name('auctions.media');
    Route::resource('/auctions', AuctionController::class);
});

require __DIR__.'/auth.php';
