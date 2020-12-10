<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PermissionController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', [HomeController::class, 'profile'])->name('profile.edit');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::prefix('settings')->group(function () {
			Route::get('/', [SettingController::class, 'edit'])->name('settings.edit');
			Route::post('/', [SettingController::class, 'update'])->name('settings.update');
		});
        Route::get('users', [UserController::class, 'index'])->name(
            'users.index'
        );
        Route::post('users', [UserController::class, 'store'])->name(
            'users.store'
        );
        Route::get('users/create', [UserController::class, 'create'])->name(
            'users.create'
        );
        Route::get('users/{user}', [UserController::class, 'show'])->name(
            'users.show'
        );
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name(
            'users.edit'
        );
        Route::put('users/{user}', [UserController::class, 'update'])->name(
            'users.update'
        );
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name(
            'users.destroy'
        );

        Route::get('events', [EventController::class, 'index'])->name(
            'events.index'
        );
        Route::post('events', [EventController::class, 'store'])->name(
            'events.store'
        );
        Route::get('events/create', [EventController::class, 'create'])->name(
            'events.create'
        );
        Route::get('events/{event}', [EventController::class, 'show'])->name(
            'events.show'
        );
        Route::get('events/{event}/edit', [
            EventController::class,
            'edit',
        ])->name('events.edit');
        Route::put('events/{event}', [EventController::class, 'update'])->name(
            'events.update'
        );
        Route::delete('events/{event}', [
            EventController::class,
            'destroy',
        ])->name('events.destroy');

        Route::get('blogs', [BlogController::class, 'index'])->name(
            'blogs.index'
        );
        Route::post('blogs', [BlogController::class, 'store'])->name(
            'blogs.store'
        );
        Route::get('blogs/create', [BlogController::class, 'create'])->name(
            'blogs.create'
        );
        Route::get('blogs/{blog}', [BlogController::class, 'show'])->name(
            'blogs.show'
        );
        Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name(
            'blogs.edit'
        );
        Route::put('blogs/{blog}', [BlogController::class, 'update'])->name(
            'blogs.update'
        );
        Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name(
            'blogs.destroy'
        );

        Route::get('sermons', [SermonController::class, 'index'])->name(
            'sermons.index'
        );
        Route::post('sermons', [SermonController::class, 'store'])->name(
            'sermons.store'
        );
        Route::get('sermons/create', [SermonController::class, 'create'])->name(
            'sermons.create'
        );
        Route::get('sermons/{sermon}', [SermonController::class, 'show'])->name(
            'sermons.show'
        );
        Route::get('sermons/{sermon}/edit', [
            SermonController::class,
            'edit',
        ])->name('sermons.edit');
        Route::put('sermons/{sermon}', [
            SermonController::class,
            'update',
        ])->name('sermons.update');
        Route::delete('sermons/{sermon}', [
            SermonController::class,
            'destroy',
        ])->name('sermons.destroy');
    });

Route::view('home', 'home')
	->name('home')
	->middleware(['auth']);

Route::view('profile', 'profile.edit')
	->name('profile.edit')
	->middleware(['auth']);
