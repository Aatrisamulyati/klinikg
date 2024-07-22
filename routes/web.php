<?php

use App\Http\Controllers\Admin\DashboardBookingController;
use App\Http\Controllers\Admin\DashboardDokterController;
use App\Http\Controllers\Admin\DashboardPasienController;
use App\Http\Controllers\Admin\DashboardProductController;
use App\Http\Controllers\Admin\DashboardServiceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dokter\DokterDetailBookingController;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;

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
    return view('/pasien/home');
});

Route::get('/home', function () {
    return view('/frontend/home');
});

Route::get('/dokter/index', function () {
    return view('/frontend/dokter/index');
});

Route::resource('/booking', TransaksiFrontendController::class);
Route::get('/layanan/index', function () {
    return view('/frontend/layanan/index');
});
Route::get('/antrian/index', function () {
    return view('/frontend/antrian/index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Admin dan Dokter
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::group(['middleware' => [CekLevel::class . ':Admin']], function () {
    Route::resource('data-pasien', DashboardPasienController::class);
    Route::resource('data-dokter', DashboardDokterController::class);
    Route::resource('data-services', DashboardServiceController::class);
    Route::resource('data-product', DashboardProductController::class);
    Route::resource('data-booking', DashboardBookingController::class);
    });

    Route::group(['middleware' => [CekLevel::class . ':Dokter']], function () {

        Route::resource('booking-detail', DokterDetailBookingController::class);
        // Route::resource('profile-dokter', DokterProfileController::class);
        // Route::get('/cetak-booking-dokter', [BarbermanCetakController::class, 'cetakbookingbarberman'])->name('/cetak-booking-barberman');
    });
});
