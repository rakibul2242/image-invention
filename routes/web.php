<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ImageGenerator;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\AddTextController;
use App\Http\Controllers\CertificateController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ImageGenerator::class)->name('image.invention');
Route::get('/image-invention', ImageGenerator::class)->name('image.invention');



Route::get('/upload', [ImageUploadController::class, 'view'])->name('image.form');
Route::post('/upload', [ImageUploadController::class, 'create'])->name('image.upload');

Route::get('/add-text', [AddTextController::class, 'view'])->name('addText.form');
Route::post('/add-text', [AddTextController::class, 'create'])->name('addText.upload');

Route::post('/certificate', [CertificateController::class, 'generate'])->name('certificate.generate');
Route::view('/certificate', 'certificate')->name('certificate');


use Illuminate\Support\Facades\Cache;

Route::get('/certificate/check', function() {
    if (Cache::has('certificate_generated_file')) {
        return response()->json([
            'file' => Cache::get('certificate_generated_file')
        ]);
    }
    return response()->json(['file' => null]);
})->name('certificate.check');
