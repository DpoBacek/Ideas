<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SnakeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/terms', [DashboardController::class, 'terms'])->name('terms');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/feed', [DashboardController::class, 'feed'])->name('feed');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);
Route::get('/snake', [SnakeController::class, 'index'])->name('snake.dashboard');



Route::post('users/{user}/follow',[FollowerController::class,'follow'])->name('users.follow')->middleware('auth');
Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->name('users.unfollow')->middleware('auth');

Route::post('idea/{idea}/like',[IdeaLikeController::class,'like'])->name('idea.like')->middleware('auth');
Route::post('idea/{idea}/unlike',[IdeaLikeController::class,'unlike'])->name('idea.unlike')->middleware('auth');


Route::group(['prefix' => 'idea/', 'as' => 'idea.', 'middleware' => ['auth']], function () {
    Route::delete('{idea}/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
});


Route::resource('idea', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('idea', IdeaController::class)->only(['show']);
Route::resource('users', UserController::class)->only(['edit', 'update'])->middleware('auth');
Route::resource('users', UserController::class)->only(['show']);

