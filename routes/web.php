<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/send/{uuid}/{amount}', [TransactionController::class, 'send']);

    Route::get('/settings', function () {
        return view('pages.settings');
    })->name('settings');

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/transactions', [DashboardController::class, 'transactions'])->name('dashboard.transactions');

        Route::get('/transactions/{id}/{action}', [DashboardController::class, 'transactor'])->name('dashboard.transactor');
    });
    Route::resource('/cards', CardController::class);

    Route::resource('/transactions', TransactionController::class);
    Route::view('/qrcode', 'pages.qrcode')->name('qrcode');
});


require __DIR__ . '/auth.php';
