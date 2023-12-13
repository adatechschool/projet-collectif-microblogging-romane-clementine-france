<?php

use App\Http\Controllers\ParametersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

//Permet d'arriver directement sur le dashboard
Route::redirect('/', '/dashboard');
Route::redirect('/profile', '/login');

//Route qui permet de définir l'uri pour consulter tous les posts
Route::prefix('/dashboard')->name('dashboard.')->controller(PostController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PostController::class, "allPosts"])->name('posts');
    //ces deux routes gèrent la création du post, la 1ere retourne la vue et la 2e permet d'interragir avec la BDD
    Route::get('/new', [PostController::class, "create"])->name('create');
    Route::post('/new', [PostController::class, "store"])->name('store');
});

Route::prefix('/profile')->name('profile.')->controller(PostController::class)->middleware(['auth', 'verified'])->group(function () {
    Route::get('/post/{user_id}', [PostController::class, "displayOne"])->name('post');
    //ces deux routes gèrent la création du post, la 1ere retourne la vue et la 2e permet d'interragir avec la BDD
    Route::get('/edit', [ProfileController::class, "editBiography"])->name('edit');
    Route::patch('/edit', [ProfileController::class, "updateBiography"])->name('update');
});

Route::middleware('auth')->group(function () {
    Route::get('/parameters', [ParametersController::class, 'edit'])->name('parameters.edit');
    Route::patch('/parameters', [ParametersController::class, 'update'])->name('parameters.update');
    Route::delete('/parameters', [ParametersController::class, 'destroy'])->name('parameters.destroy');
});

require __DIR__ . '/auth.php';
