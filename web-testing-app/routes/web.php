<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatauserController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\FirstClickController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    return view('testing.index');
})->name('testing');


Route::post('test-first-click', [FirstClickController::class, 'save'])->name('testFirstClick.post');
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/monitoring', [MonitoringController::class,'index'])->name('monitoring');
    Route::post('/get-first-click', [MonitoringController::class, 'showMonitor'])->name('getmonitor');
    Route::post('/get--detail-first-click/{id}', [MonitoringController::class, 'showDetailMonitor'])->name('getmonitordetail');
    Route::get('datapakar', function () {
        return view('datapakar');
    });

    Route::resource('data-penguji', DatauserController::class);
});

require __DIR__.'/auth.php';
