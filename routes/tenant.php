<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

use App\Http\Controllers\Tenancy\BookingController;
use App\Http\Controllers\Tenancy\FileUploadController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('tenancy.welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', function() {
            return view('tenancy.dashboard');
        })->name('dashboard');

        Route::resource('bookings', BookingController::class)->except(['show']);
        Route::get('/import', [BookingController::class, 'import'])->name('import');
        Route::post('/upload', [BookingController::class, 'upload'])->name('upload');
        //Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload.file');
        Route::get('/upload', [FileUploadController::class, 'index']);
    });

    Route::get('/file/{path}', function($path) {
        return response()->file(Storage::path($path));
    })->where('path', '.*')->name('file');

    require __DIR__.'/auth.php';
});
