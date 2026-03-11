<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkspedisiController;


Route::get('/', function () {
    return view('welcome');
});
// Route::resource('ekspedisi', EkspedisiController::class);
