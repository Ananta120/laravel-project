<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;

Route::get('/', function () {
    return redirect('/campaign');
});

Route::resource('campaign', CampaignController::class);