<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/greeting/{locale}', function (string $locale) {

    if (! in_array($locale, ['ar', 'en'])) {
        abort(400, 'Invalid Language');
    }
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('changeLang');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user/{user:username}/', [UserController::class, 'index'])->name('user.profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(PostController::class)->group(function () {
        Route::get('post/create', 'create')->name('create_post');
        Route::post('post/create', 'store')->name('store_post');
        Route::get('post/{post:slug}', 'show')->name('show_post');
        Route::get('post/{post:slug}/edit', 'edit')->name('get_update_post');
        Route::put('post/edit/{post:slug}', 'update')->name('post.update');
        Route::delete('/post/{post:slug}', 'destroy')->name('post.destroy');
        Route::get('/', 'index')->name('home_page');
        Route::get('/explore', 'explore')->name('explore');
    });
    Route::post('/post/{post:slug}/comment', [CommentController::class, 'store'])->name('comment_store');
    Route::get('/post/{post:slug}/like', LikeController::class)->name('like.post');
    Route::get('follow/{user:username}', [FollowController::class, 'follow'])->name('follow');
    Route::get('unfollow/{user:username}', [FollowController::class, 'unfollow'])->name('unfollow');

});

require __DIR__ . '/auth.php';