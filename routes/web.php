<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentationFileController;

Route::get('/', function () {
    return redirect('/campaign');
});

Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/documentations', [DocumentationFileController::class, 'index']);
Route::post('/documentations', [DocumentationFileController::class, 'store']);

Route::resource('campaign', CampaignController::class);