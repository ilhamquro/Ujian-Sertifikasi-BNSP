<?php

use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BukuController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ApiKategori;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\KategoriController;
use GuzzleHttp\Psr7\Request;

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

Route::get('/samsul', function () {
    return "Samsul";
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/user', function () {
    return "Anda User Aplikasi";
})->middleware('auth')->name('user');

// Route::get('/admin', function () {
//     return view('dashboard');
// })->middleware('auth')->name('admin');

// Route::get('/admin', function () { return view('dashboard');})->middleware('auth')->name('admin');

Route::get('/dashboard', [KategoriController::class, 'count'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [ProfileController::class, 'count'])
->middleware(['auth', 'verified'])->name('admin');

Route::middleware(['auth','role:user,admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Routing dengan controller
// Route::get('/mahasantri_petik', [MahasantriController::class, 'index'])->name('santri');
// Route::get('/mahasantri/{id}', [MahasantriController::class, 'getid']);
// Route::get('/mahasantri_cari', [MahasantriController::class, 'cari'])->name('search');

// Route Peserta
Route::get('peserta', [PesertaController::class, 'index'])->name('peserta');
Route::get('peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
Route::post('peserta/store', [PesertaController::class, 'store'])->name('peserta.store');
Route::get('peserta/destroy/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
Route::get('peserta/show/{id}', [PesertaController::class, 'show'])->name('peserta.show');
Route::get('peserta/edit/{id}', [PesertaController::class, 'edit'])->name('peserta.edit');
Route::post('peserta/update/{id}', [PesertaController::class, 'update'])->name('peserta.update');


Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/kategori/show/{id}', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
// Route::resource('/kategori',KategoriController::class);

});

// Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
// Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
// Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
// Route::get('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
// Route::get('/buku/show/{id}', [BukuController::class, 'show'])->name('buku.show');
// Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
// Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::middleware(['auth','role:admin'])->group(function () {
Route::resource('/buku',BukuController::class);
});
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



require __DIR__.'/auth.php';



Route::get('/family', [ApiKategori::class, 'getData']);
Route::get('/family/show/{id}', [ApiKategori::class, 'show']);
Route::get('/family/delete/{id}', [ApiKategori::class, 'destroy']);
Route::post('/family/update/{id}', [ApiKategori::class, 'update']);
Route::post('/family/store', [ApiKategori::class, 'store']);