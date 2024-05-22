<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MinistryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WorkersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [PagesController::class, 'about'])->name('about');

Route::get('ministries', [PagesController::class, 'ministries'])->name('ministries');

Route::get('sermons', [PagesController::class, 'sermons'])->name('sermons');

Route::get('programs', [PagesController::class, 'programs'])->name('programs');

Route::get('contact', [PagesController::class, 'contact'])->name('contact');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::resource('gallery', GalleryController::class);

Route::resource('workers', WorkersController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::resource('ministries', MinistryController::class);

require __DIR__.'/auth.php';
