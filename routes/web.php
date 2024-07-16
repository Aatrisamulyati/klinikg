<?php

use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterBackendController;
use App\Http\Controllers\JadwalBackendController;
use App\Http\Controllers\PasienBackendController;
use App\Http\Controllers\ProductBackendController;

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
    return view('/frontend/home');
});

Route::get('/home', function () {
    return view('/frontend/home');
});

Route::get('/dokter/index', function () {
    return view('/frontend/dokter/index');
});
Route::get('/booking/index', function () {
    return view('/frontend/booking/index');
});
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
Route::group(['middleware' => [CekLevel::class . ':Admin']], function () {
    Route::resource('data-pasien', PasienBackendController::class);
    Route::resource('data-dokter', DokterBackendController::class);
    Route::resource('data-jadwal', JadwalBackendController::class);
    Route::resource('data-product', ProductBackendController::class);

});

Route::get('/dashboard', function () {
    return view('/backend/layouts/main');
})->middleware(['auth']);

Route::get('/dokter', function () {
    return view('/backend/dokter/create');
});
