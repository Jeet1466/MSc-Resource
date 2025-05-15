<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UploadController;

Route::get('/', function () {
    return view('learn');
});

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');



Route::get('/pyqpage', [UploadController::class, 'showPYQ'])->name('pyq');
Route::get('/syllabuspage', [UploadController::class, 'showSyllabus'])->name('syllabus');
Route::get('/materialpage', [UploadController::class, 'showMaterial'])->name('material');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/outupload', function () {
    return view('upload');
});

Route::post('/upload', [UploadController::class, 'upload'])->name('upload');
