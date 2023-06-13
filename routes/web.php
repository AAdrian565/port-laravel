<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\pageSettingController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\skillController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/', [homepageController::class, 'index']);
Route::redirect('login', 'auth');
Route::redirect('logout', 'auth/logout');
Route::redirect('home', 'admin');


Route::group(['prefix' => '/auth'], function () {
    Route::get('/', [authController::class, "index"])->name('login')->middleware('guest');
    Route::get('/redirect', [authController::class, "redirect"])->middleware('guest');
    Route::get('/callback', [authController::class, "callback"])->middleware('guest');
    Route::get('/logout', [authController::class, "logout"])->name('logout');
});

Route::prefix('admin')->middleware('auth')->group(
    function () {
        Route::get('/', [pagesController::class, 'index']);
        Route::resource('pages', pagesController::class);
        Route::resource('education', educationController::class);
        Route::resource('experience', experienceController::class);
        Route::get('skill', [skillController::class, "index"])->name('skill.index');
        Route::post('skill', [skillController::class, "update"])->name('skill.update');
        Route::get('profile', [profileController::class, "index"])->name('profile.index');
        Route::post('profile', [profileController::class, "update"])->name('profile.update');
        Route::get('pagesetting', [pageSettingController::class, "index"])->name('pagesetting.index');
        Route::post('pagesetting', [pageSettingController::class, "update"])->name('pagesetting.update');
    }
);
