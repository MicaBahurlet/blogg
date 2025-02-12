<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


// Rutas publicas, ningun middleware

Route::get('/', function () {
    return view('welcome');
}) ->name('welcome');

//Rutas protegidas

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); //acá verifica automaticamente a menos que lo cambie desde Breeze


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post ('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Agrega esta ruta para mostrar un post individual
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
