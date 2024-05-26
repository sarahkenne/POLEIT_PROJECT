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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
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

Route::get('/merci',function(){
    return view('paniers.merci');
});
Route::get('test' , function(){
    return view('test');
});
Route::post('/cart/destroy', [panierController::class, 'dest'])->name('cart.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
});
  