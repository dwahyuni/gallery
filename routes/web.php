<?php

use App\Http\Controllers\CommentsController;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth', 'ceklevel:admin'])->group(function () {

    Route::get('/pengguna', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/editpengguna/{id}', [App\Http\Controllers\EditPenggunaController::class, 'edit'])->name('editpengguna');
    Route::put('/editpengguna/{id}', [App\Http\Controllers\EditPenggunaController::class, 'update'])->name('user.updatepengguna');

    Route::put('/user/edit/{id}', [App\Http\Controllers\EditPenggunaController::class, 'update'])->name('user.edit');
    Route::delete('/user/destroy/{id}', [App\Http\Controllers\EditPenggunaController::class, 'destroy'])->name('user.destroy');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');


    Route::middleware(['auth', 'ceklevel:admin,user'])->group(function () {

        Route::get('/beranda', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda');
        Route::get('/buat', [App\Http\Controllers\BuatController::class, 'index'])->name('buat');
        Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    });


    Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store'])->name('post.store');
    // Route::post('/like',  [App\Http\Controllers\PostsController::class, 'likePhoto']);
    Route::post('comment/{post}', [CommentsController::class, 'postComment'])->name('addComment');
    Route::get('/delete/{id:id}', [App\Http\Controllers\PostsController::class, 'delete']);

});
    