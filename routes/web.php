<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\inscriptionActiviteController;
use App\Http\Controllers\ArticleBlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('activites', ActiviteController::class);
Route::resource('inscriptions', inscriptionActiviteController::class);
Route::resource('blogs', ArticleBlogController::class);
