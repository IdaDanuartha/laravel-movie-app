<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
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
Route::redirect('/', '/movies');

Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

Route::get('/tv-shows', [MoviesController::class, 'index'])->name('tvshows.index');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
// Route::get('/actors/{id}', '[ActorsController::class, 'show'])->name('actors.show');
Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);

