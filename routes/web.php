<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Http\Controllers\ComentarioController;
use App\Models\Comentario;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/profile', 'ProfileController')->name('profile');

Route::resource('posts', PostController::class);

Route::resource('/', PostController::class)->names([
    'index' => 'posts.index',
    'create' => 'posts.create',
    'store' => 'posts.store',
    'show' => 'posts.show',
  ]);

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::post('/uploadProfileImage', [App\Http\Controllers\ProfileController::class, 'uploadProfileImage'])->name('uploadProfileImage');

Route::post('/profile/update', [App\Http\Controllers\RegisterController::class, 'updateProfile'])->name('updateProfile');

Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('updateProfile');

Route::get('/posts/publicaciones', [App\Http\Controllers\PostController::class, 'index'])->name('posts.publicaciones');

Route::get('category/{category}', [App\Http\Controllers\PostController::class, 'category'])->name('posts.category');

Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'showPost'])->name('posts.showPost');

Route::get('/profile/{username}', [App\Http\Controllers\PostController::class, 'show'])->name('profile.show');

Route::get('/profiles/{username}', [ProfileController::class, 'show'])->name('profile.show');

Route::post('comentario/{post}', [ComentarioController::class, 'guardar'])->name('comentario.guardar');

