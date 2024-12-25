<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;

Auth::routes();

Route::prefix('articles')->group(function () {
  Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
  Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
  Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
  Route::get('/{article}', [ArticleController::class, 'show'])->name('articles.show');
  Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
  Route::put('/{article}', [ArticleController::class, 'update'])->name('articles.update');
  Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::get('comments.store', [CommentController::class, 'store'])->name('comments.store');
Route::get('comments.{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/',[ ArticleController::class , 'index'])->name('public.index');
Route::get('/{article}',[ ArticleController::class , 'show'])->name('public.show');
