<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\FileUpload;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/collections', function () {
    return view('collections');
})->middleware(['auth', 'verified'])->name('collections');



Route::post('/upload-folder', [UploadController::class, 'uploadFolder'])->name('upload.folder');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
