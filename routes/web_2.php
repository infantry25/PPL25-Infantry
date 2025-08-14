<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ConfigurationController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProjectController as AdminProjectController;
use App\Http\Controllers\admin\ProjectImageController;
use App\Http\Controllers\admin\ServiceController as AdminServiceController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PartnershipController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class])->name('login');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/service/detail/{id}/{slug}', [ServiceController::class, 'show'])->name('service-detail');
Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/partnership', [PartnershipController::class, 'create'])->name('partnership.create');
Route::post('/partnership', [PartnershipController::class, 'store'])->name('partnership.store');

Route::get('/partnership/tracking', [PartnershipController::class, 'tracking'])->name('partnership.tracking');
Route::post('/partnership/tracking', [PartnershipController::class, 'checkStatus'])->name('partnership.check');

// Route::get('/service/detail', [ServiceController::class, 'show'])->name('service-detail');

Auth::routes([
    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('/admin/configuration/logo', [ConfigurationController::class, 'create_logo'])->name('konfigurasi-logo');
    Route::post('/admin/configuration/logo/proses', [ConfigurationController::class, 'proses_logo'])->name('proses-logo');
    Route::get('/admin/configuration/icon', [ConfigurationController::class, 'create_icon'])->name('konfigurasi-icon');
    Route::post('/admin/configuration/icon/proses', [ConfigurationController::class, 'proses_icon'])->name('proses-icon');
    Route::resource('/admin/configuration', ConfigurationController::class);
    Route::resource('/admin/testimonial', TestimonialController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/staff', StaffController::class);
    Route::resource('/admin/service', AdminServiceController::class);
    Route::resource('/admin/client', ClientController::class);
    Route::resource('/admin/project', AdminProjectController::class);
    Route::post('/admin/project/{project}', [AdminProjectController::class, 'store_image'])->name('project.images');
    Route::delete('/admin/projectImage/{projectImage}', [AdminProjectController::class, 'destroy_image'])->name('project.delete');
    Route::get('/admin/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/admin/user/profile/{user}/edit', [UserController::class, 'edit_profile'])->name('user.profile_edit');
    Route::put('/admin/user/profile/{user}', [UserController::class, 'update_profile'])->name('user.profile_update');
    Route::put('/admin/user/profile/password/{user}', [UserController::class, 'change_password'])->name('user.change_password');
    Route::resource('/admin/user', UserController::class);
});
