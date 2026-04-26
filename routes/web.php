<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeController as Controllershomecontroller;
use App\Http\Controllers\ProfilControler;
use App\Http\Controllers\ProfilControler as ControllersProfilcontroler;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\HomeController as ControllersKontakcontroller;

Route::get ('/', [HomeController::class, 'index']);
Route::get ('/profil', [ProfilControler::class, 'index']);
Route::get ('/kontak', [KontakController::class, 'index']);