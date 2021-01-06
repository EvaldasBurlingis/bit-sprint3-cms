<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;


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


Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/dashboard', [AdminPostController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/posts/new', [AdminPostController::class, 'create'])->middleware(['auth']);
Route::post('/dashboard/posts/new', [AdminPostController::class, 'store'])->middleware('auth');

require __DIR__.'/auth.php';
