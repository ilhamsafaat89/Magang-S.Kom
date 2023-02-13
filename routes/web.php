<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\UsulPlotPembimbingController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/detailmagang/{id}', [MainController::class, 'detail']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin
Route::get('/admin/usulplotpembimbing/plot/{id}', [UsulPlotPembimbingController::class, 'plot']);
Route::get('/admin/usulplotpembimbing/lihatdataplot', [UsulPlotPembimbingController::class, 'lihatdataplot']);
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');
Route::resource('/admin/magang', MagangController::class);
Route::resource('/admin/pembimbing', PembimbingController::class);
Route::resource('/admin/mahasiswa', MahasiswaController::class);
Route::resource('/admin/usulplotpembimbing', UsulPlotPembimbingController::class);

Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
