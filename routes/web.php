<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\inscriptionActiviteController;
use App\Http\Controllers\ArticleBlogController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CategorieProduitController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\quantiteController;
use App\Http\Controllers\panierController;
use App\Http\Controllers\payementController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('activites', ActiviteController::class);
Route::resource('inscriptions', inscriptionActiviteController::class);
Route::resource('blogs', ArticleBlogController::class);
Route::resource('articles', articleController::class);
Route::resource('categories', CategorieController::class);
Route::resource('categorieproduits', CategorieProduitController::class);
Route::resource('contacts', contactController::class);
Route::resource('produits', quantiteController::class);
Route::resource('paniers', panierController::class);
Route::resource('payements', payementController::class);

/* route de remerciement */

// Route::get('/merci', 'payementController@thankyou' );