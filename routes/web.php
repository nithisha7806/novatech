```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminEnquiriesController;
use App\Http\Controllers\EnquiryStatusController;
use App\Http\Controllers\EnquiryDetailsController;
use App\Http\Controllers\ExportEnquiriesController;

// NovaTech Home Page
Route::get('/', function () {
    return view('welcome');
});

// Contact Form Submit
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

// Admin Dashboard - Login required
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');

// Admin Enquiries Page - Login required
Route::get('/admin/enquiries', [AdminEnquiriesController::class, 'index'])
    ->middleware('auth')
    ->name('admin.enquiries');

// Export Enquiries to CSV for Excel - Login required
Route::get('/admin/enquiries/export', [ExportEnquiriesController::class, 'export'])
    ->middleware('auth')
    ->name('admin.enquiries.export');

// Update Enquiry Status - Login required
Route::patch('/admin/enquiries/{id}/status', [EnquiryStatusController::class, 'update'])
    ->middleware('auth')
    ->name('admin.enquiries.update');

// View Individual Enquiry - Login required
Route::get('/admin/enquiries/{id}', [EnquiryDetailsController::class, 'show'])
    ->middleware('auth')
    ->whereNumber('id')
    ->name('admin.enquiries.show');

// Breeze Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
