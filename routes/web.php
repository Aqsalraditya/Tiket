<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;

Route::resource('tickets', TiketController::class);