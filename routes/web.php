<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostFilterController;
use App\Http\Controllers\ReplyController;
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


Route::prefix('login')->name('login')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm']);
    Route::post('/', [AuthController::class, 'login']);
});

Route::prefix('register')->name('register')->group(function () {
    Route::get('/', [AuthController::class, 'showRegistrationForm']);
    Route::post('/', [AuthController::class, 'register']);
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('post', BlogController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('replies', ReplyController::class);
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('likes.like');
    Route::delete('/posts/{post}/unlike', [LikeController::class, 'unlike'])->name('likes.unlike');

    Route::resource('post', BlogController::class)->only('create', 'store');

    Route::resource('comments', CommentController::class)->only(['index', 'show', 'store']);

    Route::resource('replies', ReplyController::class)->only(['index', 'show', 'store']);

});

Route::get('/', [BlogController::class, 'index'])->name('blog.index');

Route::resource('post', BlogController::class)->only('index', 'show');

Route::get('/filter-posts', PostFilterController::class)->name('posts.filter');

Route::get('/about', [PagesController::class, 'about'])->name('blog.about');

Route::prefix('contact')->group(function () {
    Route::get('/', [PagesController::class, 'contact'])->name('blog.contact');
    Route::post('/', [ContactController::class, 'send'])->name('contact.send');
});
