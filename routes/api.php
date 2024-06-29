<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;


Route::get('/prueba', function () {
    return 'prueba';
});


 Route::post('register', [RegisterController::class,'store'])->name('api.v1.registrer');
