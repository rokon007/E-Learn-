<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\Landing\Welcome;
use App\Livewire\Frontend\User\Dashboard;

use App\Livewire\Frontend\User\Profile;
use App\Livewire\Frontend\User\PassBook;
use App\Livewire\Frontend\User\Referral;
use App\Livewire\Frontend\User\Withdrawal;
use App\Livewire\Frontend\User\ChangePassword;
use App\Livewire\Frontend\User\Homework;
use App\Livewire\Frontend\User\BuyOffer;
use App\Livewire\Frontend\User\Courses;
use App\Livewire\Frontend\User\LeadConverts;
use App\Livewire\Frontend\User\Notification;

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



// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('pass-book', PassBook::class)->name('passbook');
    Route::get('referral', Referral::class)->name('referral');
    Route::get('withdrawal', Withdrawal::class)->name('withdrawal');
    Route::get('change-password', ChangePassword::class)->name('changepassword');
    Route::get('home-work', Homework::class)->name('homework');
    Route::get('buy-offer', BuyOffer::class)->name('buyoffer');
    Route::get('courses', Courses::class)->name('courses');
    Route::get('leadconverts', LeadConverts::class)->name('leadconverts');
    Route::get('notification', Notification::class)->name('notification');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/users', UserManagement::class)->name('admin.users');
});

require __DIR__.'/auth.php';
