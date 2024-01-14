<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('show.kategori');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('add.kategori');
    Route::get('/listKategori', [KategoriController::class, 'dataTableKategori'])->name('list.kategori');

    // product
    Route::get('/produk', [ProdukController::class, 'index'])->name('show.produk');
    Route::get('/addproduk', [ProdukController::class, 'create'])->name('add.produk');
    Route::post('/storeproduk', [ProdukController::class, 'store'])->name('store.produk');
    Route::get('/listProduk', [ProdukController::class, 'dataTableProduk'])->name('list.produk');
    Route::get('/deleteProduk/{id}', [ProdukController::class, 'destroy'])->name('delete.produk');
    Route::get('/update/{id}', [ProdukController::class, 'update'])->name('update.produk');
    Route::post('/editProduk', [ProdukController::class, 'edit'])->name('edit.produk');
});

require __DIR__ . '/auth.php';
