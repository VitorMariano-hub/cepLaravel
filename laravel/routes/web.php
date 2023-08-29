<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CepController;
use App\Http\Controllers\CsvController;


Route::get('/', [CepController::class, 'index']);

Route::post('/search', [CepController::class, 'show']);
Route::post('/download', [CsvController::class, 'download']);

