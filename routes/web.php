<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendataanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\ProfileController;
use App\Models\Kategori;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return redirect()->route('login');
});

//frontend
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/input-data', [PendataanController::class, 'create'])->name('create');

Route::resource('pendataan', PendataanController::class);

//backend

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('penduduk', PendudukController::class);

    Route::get('/data-penduduk/pekerjaan/{id}', [PendudukController::class, 'pekerjaan'])->name('penduduk.pekerjaan');
    Route::get('/data-penduduk/bantuan/{id}', [PendudukController::class, 'bantuan'])->name('penduduk.bantuan');
    Route::get('/data-penduduk/kategori/{id}', [PendudukController::class, 'kategori'])->name('penduduk.kategori');
});
Route::resource('pekerjaan', PekerjaanController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('bantuan', BantuanController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
