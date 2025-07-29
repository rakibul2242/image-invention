<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ImageGenerator;
use App\Http\Controllers\ImageUploadController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ImageGenerator::class)->name('image.invention');
Route::get('/image-invention', ImageGenerator::class)->name('image.invention');



Route::get('/upload', [ImageUploadController::class, 'view'])->name('image.form');
Route::post('/upload', [ImageUploadController::class, 'create'])->name('image.upload');

