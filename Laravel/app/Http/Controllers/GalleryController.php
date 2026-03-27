<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
//use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman indeks galeri.
     */
    public function index()
    {
        // Mengambil data galeri terbaru dengan pagination 12 item per halaman
        $galleries = Gallery::latest()->paginate(12);

        // Mengirim data ke view gallery.index
        return view('gallery.index', compact('galleries'));
    }
}