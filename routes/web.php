<?php

use App\Http\Controllers\PostController;
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


Route::get('/', [PostController::class, 'getAllPublished']);
Route::get('/post/{slug}', [PostController::class, 'getSinglePublished']);


Route::get('/dashboard', function () {
    return view('authenticated.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/post/new', [PostController::class, 'store'])->middleware(['auth']);

require __DIR__.'/auth.php';
