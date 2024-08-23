<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\offrecontroller;
use App\Http\Controllers\reservationcontroller;
use App\Http\Controllers\messagecontroller;
use App\Http\Controllers\aviscontroller;


/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [offrecontroller::class, 'index'])->name('home');

// Routes pour les annonces
Route::resource('offres', offrecontroller::class);

// Routes pour les réservations
Route::resource('reservations', reservationcontroller::class);

// Routes pour les messages
Route::resource('messages', MessageController::class);

// Routes pour les avis
Route::resource('reviews', aviscontroller::class);



