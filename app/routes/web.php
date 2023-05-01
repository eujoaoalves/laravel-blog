<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['web'])->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('post.index');

    Route::middleware(['guest'])->group(function () {
        Route::get('login', [UserController::class, 'login'])->name('login');
        Route::get('register', [UserController::class, 'register'])->name('register');
    });

    Route::middleware(['auth'])->group(function () {
        Route::post('logout', [UserController::class, 'logout'])->name('logout');
        Route::get('my-posts', [UserController::class, 'listAllUserPosts'])->name('user.posts');

        Route::prefix('post')->group(function () {
            Route::get('create', [PostController::class, 'create'])->name('post.create');
            Route::post('store', [PostController::class, 'store'])->name('post.store');
            Route::get('{post:slug}', [PostController::class, 'show'])->name('post.show');
            Route::get('edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
            Route::put('edit/{post:slug}', [PostController::class, 'update'])->name('post.update');
            Route::get('delete/{post:id}', [PostController::class, 'destroy'])->name('post.destroy');
        });
    });
});

Auth::routes();
