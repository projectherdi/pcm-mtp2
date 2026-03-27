<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes - PCM Martapura 2
|--------------------------------------------------------------------------
*/

// 1. Halaman Utama (Home)
Route::get('/', [PostController::class, 'index'])->name('home');

// 2. Halaman Profil (TAMBAHKAN INI UNTUK MEMPERBAIKI ERROR)
Route::get('/profil', function () {
    return view('profile');
})->name('profile');
Route::get('/profil', [PostController::class, 'indexProfile'])->name('profile');

// 3. Kabar / Berita
Route::get('/berita', [PostController::class, 'indexBerita'])->name('posts.index');
Route::get('/artikel/{slug}', [PostController::class, 'show'])->name('posts.show');

// 4. Galeri Kegiatan
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// 5. Kontak
Route::view('/contact', 'contact')->name('contact');