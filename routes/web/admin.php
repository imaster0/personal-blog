<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;


Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
