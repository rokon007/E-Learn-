<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\Landing\Welcome;
use App\Livewire\Frontend\User\Dashboard;
use App\Livewire\Backend\Admin\Dashboard as AdminDashboard;
use App\Livewire\Backend\Admin\UserManagement;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', Welcome::class)->name('welcome');
// AJAX validation রুট
Route::post('/validate-step1', [RegistrationController::class, 'validateStep1'])->name('validate.step1');

// রেজিস্ট্রেশন রুট
Route::post('/register', [RegistrationController::class, 'register'])->name('register.submit');

Route::get('dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/users', UserManagement::class)->name('admin.users');
});

require __DIR__.'/auth.php';
