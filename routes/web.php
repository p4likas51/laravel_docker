<?php

use App\Http\Controllers\PostalCodeController;
use Illuminate\Support\Facades\Route;

// Route::get(uri: '/', action: function () {
//     return view(view: 'welcome');
// });

Route::get('/', [PostalCodeController::class, 'showData']);
Route::get('/', [PostalCodeController::class, 'handleForm']);
// Route::post('/search', [PostalCodeController::class, 'getResult']);
