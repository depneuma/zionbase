<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PackageController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\InvestmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile.edit');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::webhooks('payments/store');

Route::group(['middleware' => ['auth', 'verified']], function () {

	// Admin Routes
	Route::group(['middleware' => ['can:isAdmin']], function () {
		Route::prefix('settings')->group(function () {
			Route::get('/', [SettingController::class, 'edit'])->name('settings.edit');
			Route::post('/', [SettingController::class, 'update'])->name('settings.update');
		});

		Route::prefix('packages')->group(function () {
			Route::post('/', [PackageController::class, 'store'])->name('packages.store');
		});
	});

	Route::prefix('packages')->group(function () {
		Route::get('/', [PackageController::class, 'index'])->name('packages.index');
	});

	Route::prefix('investments')->group(function () {
		Route::post('/store', [InvestmentController::class, 'store'])->name('investments.store');
		Route::get('/status', [InvestmentController::class, 'paymentStatus'])->name('investments.status');
	});
});

Route::view('home', 'home')
	->name('home')
	->middleware(['auth']);

Route::view('profile', 'profile.edit')
	->name('profile.edit')
	->middleware(['auth']);
