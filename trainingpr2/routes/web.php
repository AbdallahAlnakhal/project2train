<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\TagController;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ArticleController::class, 'index'])->name('home');
    Route::get('/show', [ArticleController::class, 'show'])->name('show');

    Route::get('/articles/{article}', [ArticleController::class,'showa'])->name('articles.show');
    Route::resource('articles', ArticleController::class);
    Route::get('/about', [StaticPageController::class, 'about'])->name('about');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/createpost_data', [ArticleController::class, 'store'])->name('articles.createpost_data');

        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);
        Route::resource('article_tags', ArticleTagController::class)->except([ 'edit']);


});

