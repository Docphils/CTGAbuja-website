<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MinistryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SermonsController;
use App\Http\Controllers\WorkersController;
use App\Http\Controllers\ProgramsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [AboutController::class, 'index'])->name('abouts.index');


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
    Route::resource('ministries', MinistryController::class)->except(['index', 'show']);
    Route::resource('programs', ProgramsController::class)->except(['index', 'show']);
    Route::get('programs/{id}/registrations', [ProgramsController::class, 'registrations'])->name('programs.registrations');

    // Activities routes
    Route::get('activities/create', [ProgramsController::class, 'createActivity'])->name('activities.create');
    Route::post('activities', [ProgramsController::class, 'storeActivity'])->name('activities.store');
    Route::get('activities/{activity}/edit', [ProgramsController::class, 'editActivity'])->name('activities.edit');
    Route::put('activities/{activity}', [ProgramsController::class, 'updateActivity'])->name('activities.update');
    Route::delete('activities/{activity}', [ProgramsController::class, 'destroyActivity'])->name('activities.destroy');
    // Resource routes for contact messages
    Route::resource('contacts', ContactController::class)->except(['index', 'show', 'store']);
    // Route to show all messages
    Route::get('contacts/messages', [ContactController::class, 'messages'])->name('contacts.messages');

    // Routes for editing and updating contact info
    Route::get('contact-info/edit', [ContactController::class, 'editContactInfo'])->name('contact-info.edit');
    Route::put('contact-info', [ContactController::class, 'updateContactInfo'])->name('contact-info.update');
    Route::delete('contact-info/{contactInfo}', [ContactController::class, 'deleteContactInfo'])->name('contact-info.delete');

    // Resource route for showing a single contact message
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

    //About Page routes
    Route::get('about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('about', [AboutController::class, 'update'])->name('about.update');

    //Routes for SermonVideos
    Route::get('/sermons', [SermonsController::class, 'index'])->name('sermons.index');
    Route::get('/sermons/create', [SermonsController::class, 'create'])->name('sermons.create');
    Route::post('/sermons', [SermonsController::class, 'store'])->name('sermons.store');
    Route::get('/sermons/{sermonVideo}/edit', [SermonsController::class, 'edit'])->name('sermons.edit');
    Route::put('/sermons/{sermonVideo}', [SermonsController::class, 'update'])->name('sermons.update');
    Route::delete('/sermons/{sermonVideo}', [SermonsController::class, 'destroy'])->name('sermons.destroy');

  
});

Route::resource('ministries', MinistryController::class)->only(['show', 'index']);
Route::resource('programs', ProgramsController::class)->only(['show', 'index']);
Route::post('programs/{id}/register', [ProgramsController::class, 'register'])->name('programs.register');
Route::get('programs/{id}/register', [ProgramsController::class, 'registerForm'])->name('programs.registerForm');


// Custom routes for displaying and handling the contact form
Route::get('contact', [ContactController::class, 'index'])->name('contacts.index');
Route::post('contact', [ContactController::class, 'store'])->name('contacts.store');


require __DIR__.'/auth.php';
