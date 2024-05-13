<?php

use App\Models\Spp;
use App\Exports\AllSppExport;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSppController;
use App\Http\Controllers\HargaSppController;
use App\Http\Controllers\PenggunaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/sppsiswa', function () {
//     return view('spp.user.index');
// })->middleware(['auth'])->name('sppsiswa');

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/siswa', SiswaController::class)->middleware('admin');
Route::resource('/spp', SppController::class)->middleware('admin');

// Route::get('/spp/detail/{id}', [SppController::class, 'show'])->middleware('admin')->name('spp.detail');


Route::resource('/user', PenggunaController::class)->middleware('admin');

Route::post('/spp/allexport', [SppController::class, 'allexport'])->middleware('admin')->name('spp.allexport');
Route::post('/spp/export', [SppController::class, 'export'])->middleware('admin')->name('spp.export');


// Route::resource('/spp/detail', DetailsppController::class)->middleware('admin');
// Route::get('/spp/detail/create', [DetailsppController::class, 'create'])->middleware('admin');
Route::resource('/spp/detail', HargaSppController::class)->middleware('admin');
Route::post('/spp/detail/create', [HargaSppController::class, 'create'])->middleware('admin')->name('spp.detail.create');
Route::post('/spp/detail/edit', [HargaSppController::class, 'edit'])->middleware('admin')->name('spp.detail.edit');
// Route::post('/spp/detail/create', [HargaSppController::class, 'create'])->middleware('admin')->name('spp.detail.create');

Route::get('/sppsiswa', [UserSppController::class, 'index'])->middleware(['auth'])->name('sppsiswa');




require __DIR__ . '/auth.php';