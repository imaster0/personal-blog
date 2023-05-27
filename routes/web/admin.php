<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;


Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
