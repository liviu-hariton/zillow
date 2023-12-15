<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/hello', [IndexController::class, 'show'])->name('hello');

Route::resource('listing', ListingController::class);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']); // enable / generate only this routes

Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function() {
        // specific route for restoring a soft deleted listing
        Route::name('listing.restore')
            ->put('listing/{listing}/restore', [RealtorListingController::class, 'restore'])
            ->withTrashed();

        Route::resource('listing', RealtorListingController::class)->withTrashed();
        Route::resource('listing.image', RealtorListingImageController::class)->only(['create', 'store']);
    });
