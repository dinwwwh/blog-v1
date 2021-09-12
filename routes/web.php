<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
})->name('home');

/**
 * ===========================================
 * Auth routes
 * ===========================================
 */

Route::get('login', [AuthController::class, 'viewLogin'])
    ->middleware(['guest'])
    ->name('login');
Route::post('login', [AuthController::class, 'login'])
    ->middleware(['guest'])
    ->name('login');

/**
 * ===========================================
 * User routes
 * ===========================================
 */

Route::get('register', [UserController::class, 'viewRegister'])
    ->middleware(['guest'])
    ->name('register');
Route::post('register', [UserController::class, 'register'])
    ->middleware(['guest'])
    ->name('register');

Route::prefix('password')->group(function () {
    Route::get('reset', [AuthController::class, 'view'])
        ->middleware(['guest'])
        ->name('password.reset');
    Route::patch('reset', [AuthController::class, 'view'])
        ->middleware(['guest'])
        ->name('password.reset');
    Route::get('change', [AuthController::class, 'view'])
        ->middleware(['auth'])
        ->name('password.change');
    Route::patch('change', [AuthController::class, 'view'])
        ->middleware(['auth'])
        ->name('password.change');
});

/**
 * ===========================================
 * Tag routes
 * ===========================================
 */


/**
 * ===========================================
 * Post routes
 * ===========================================
 */

Route::prefix('posts')->group(function () {

    Route::get('create', [PostController::class, 'viewCreate'])
        ->middleware(['auth', 'verified'])
        ->name('posts.viewCreate');
    Route::post('create', [PostController::class, 'create'])
        ->middleware(['auth', 'verified'])
        ->name('posts.create');
    Route::prefix('{post}')->group(function () {
        Route::get('', [PostController::class, 'show'])
            ->name('posts.show');
    });
});
