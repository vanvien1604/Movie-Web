<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;


Route::get('/',[PagesController::class,'index'])->name('homepage');
Route::get('/category/{slug}',[PagesController::class,'category'])->name('category');
Route::get('/the-loai/{slug}',[PagesController::class,'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[PagesController::class,'country'])->name('country');
Route::get('/phim/{slug}',[PagesController::class,'movie'])->name('movie');
Route::get('/xem-phim/{slug}',[PagesController::class,'watch'])->name('watch');
Route::get('/episode/{slug}',[PagesController::class,'episode'])->name('episode');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
Route::resource('Categories', CategoriesController::class);
Route::resource('Genre', GenreController::class);
Route::resource('Movie', MovieController::class);
Route::resource('Country', CountryController::class);
Route::resource('Episode', EpisodeController::class);
Route::get('/select-movie/{id}', [EpisodeController::class, 'select_movie'])->name('select-movie');
