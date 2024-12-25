<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;

Auth::routes();
Route::prefix('articles')->group(function(){
    Route::get('/',[ ArticleController::class , 'index'])->name('articles.index');
    Route::get('/create',[ ArticleController::class , 'create'])->name('articles.create');
    Route::post('/store',[ ArticleController::class , 'store']);
    Route::get('/{article}',[ ArticleController::class , 'show'])->name('articles.show');
    Route::get('/{article}/edit',[ ArticleController::class , 'edit'])->name('articles.edit');
    Route::put('/{article}',[ ArticleController::class , 'update']);
    Route::delete('/{article}',[ ArticleController::class , 'destroy'])->name('articles.destroy');
});
Route::get('/',[ ArticleController::class , 'index']);

Route::get('/test' , function(){
    $user = Auth::user();
    if ($user->roles->contains('name', 'admin')) {
        echo 'L\'utilisateur est un administrateur.';
    }
    ;
    
});