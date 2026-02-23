<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use Symfony\Component\HttpFoundation\Request;

Route::get('/vulnerable/search', function (Illuminate\Http\Request $request) {
    $query = $request->query('q');
    return view('vulnerable.search', compact('query'));
});

Route::post('/comment', [TiketController::class, 'storeComment'])->name('comment.store');
Route::resource('tickets', TiketController::class);