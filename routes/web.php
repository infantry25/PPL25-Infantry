<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PartnershipAdminController;

/*
|--------------------------------------------------------------------------
| Frontend Routes (Client Side)
|--------------------------------------------------------------------------
*/

// Halaman Utama & Umum
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class])->name('login');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Service & Project
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/service/detail/{id}/{slug}', [ServiceController::class, 'show'])->name('service-detail');

Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.gallery');

// Partnership (Client)
Route::get('/partnership', [PartnershipController::class, 'create'])->name('partnership.create');
Route::post('/partnership', [PartnershipController::class, 'store'])->name('partnership.store');

Route::get('/partnership/tracking', [PartnershipController::class, 'tracking'])->name('partnership.tracking');
Route::post('/partnership/tracking', [PartnershipController::class, 'checkStatus'])->name('partnership.check');


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false,
]);


/*
|--------------------------------------------------------------------------
| Backend Routes (Admin Side) - Protected by Auth Middleware
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

    // Configuration
    Route::get('/configuration/logo', [ConfigurationController::class, 'create_logo'])->name('konfigurasi-logo');
    Route::post('/configuration/logo/proses', [ConfigurationController::class, 'proses_logo'])->name('proses-logo');

    Route::get('/configuration/icon', [ConfigurationController::class, 'create_icon'])->name('konfigurasi-icon');
    Route::post('/configuration/icon/proses', [ConfigurationController::class, 'proses_icon'])->name('proses-icon');

    Route::resource('/configuration', ConfigurationController::class);

    // Testimonial
    Route::resource('/testimonial', TestimonialController::class);

    // Category
    Route::resource('/category', CategoryController::class);

    // Staff & Team
    Route::resource('/staff', StaffController::class);

    // Service
    Route::resource('/service', AdminServiceController::class);

    // Client
    Route::resource('/client', ClientController::class);

    // Project & Gallery
    Route::resource('/project', AdminProjectController::class);
    Route::post('/project/{project}', [AdminProjectController::class, 'store_image'])->name('project.images');
    Route::delete('/projectImage/{projectImage}', [AdminProjectController::class, 'destroy_image'])->name('project.delete');

    // User & Profile
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/profile/{user}/edit', [UserController::class, 'edit_profile'])->name('user.profile_edit');
    Route::put('/user/profile/{user}', [UserController::class, 'update_profile'])->name('user.profile_update');
    Route::put('/user/profile/password/{user}', [UserController::class, 'change_password'])->name('user.change_password');
    Route::resource('/user', UserController::class);

    // Partnership (Admin View)
    Route::get('/partnership', [PartnershipAdminController::class, 'index'])->name('admin.partnership.index');
    Route::post('/partnership/{id}/update', [PartnershipAdminController::class, 'updateStatus'])->name('admin.partnership.update');
});
