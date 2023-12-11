<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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


//Route qui permet de définir l'uri pour consulter tous les posts
Route::get('/posts', [PostController::class, "allPosts"])->middleware(['auth', 'verified'])->name('posts');
//Route qui permet de définir l'uri pour consulter un post en fonction de l'user_id (ne marche pas)
Route::get('/post/{user_id}', [PostController::class, "displayOne"])->middleware(['auth', 'verified'])->name('post');


Route::get('/', function () {
    return view('welcome', ['name' => 'Clémentine']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
