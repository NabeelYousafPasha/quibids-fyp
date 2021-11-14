<?php

use App\Models\Role;
use App\Http\Controllers\{AuctionController, CategoryController, HomeController, PackageController, UserController, PermissionRoleController, UserBiddingController};
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

    Route::group([
        'prefix' => 'dashboard',
        'as' => 'dashboard.',
    ], function() {
        Route::get('/', [HomeController::class, 'dashboard'])->name('index');

        Route::group([
            'prefix' => 'setup',
            'as' => 'setup.',
        ], function () {
            Route::get('permissions-roles', [PermissionRoleController::class, 'create'])->name('permission_role.create');
            Route::post('permissions-roles', [PermissionRoleController::class, 'store'])->name('permission_role.store');
        });

        // package
        Route::resource('/packages', PackageController::class);

        // vendor
        Route::get('/vendors', [UserController::class, 'vendors'])->name('vendors');

        // user
        Route::get('/users', [UserController::class, 'users'])->name('users');

        // user & vendor => status
        Route::get('/{role}/{person}/status', [UserController::class, 'toggleStatus'])
            ->name('switch-status')
            ->where('role', '('.str_replace(',', '|', implode(',', [Role::VENDOR, Role::USER])).')');

        // category
        Route::resource('/categories', CategoryController::class);

        // auction
        Route::get('/auctions/{auction}/media', [AuctionController::class, 'listMedia'])->name('auctions.media');
        Route::post('/auctions/{auction}/media', [AuctionController::class, 'uploadMedia'])->name('auctions.media');
        Route::resource('/auctions', AuctionController::class);

        // bidding
        Route::resource('/biddings', UserBiddingController::class);
    });
});

require __DIR__.'/auth.php';
