<?php

use App\Http\Controllers\GenerationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GenerationController::class, 'create'])
    ->name('generation.create');

Route::get('show', [GenerationController::class, 'show'])
    ->name('generation.show');

Route::post('/generate', [GenerationController::class, 'generate'])
    ->name('generation.generate');
