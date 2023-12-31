<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PreUserController;
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
use App\Livewire\Counter;
use App\Livewire\UserList;

Route::get('/counter', Counter::class);
Route::get('/users', UserList::class);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register-complete', function () {
    return view('pre-users.register-complete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('tenants', TenantController::class);
});

Route::resource('pre-users', PreUserController::class);

require __DIR__.'/auth.php';
