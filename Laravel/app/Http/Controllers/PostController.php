<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Testimoni;
use App\Models\Gallery;
use App\Models\Officer;
//use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan Halaman Beranda (Home)
     */
    public function index()
    {
        // 1. Ambil Data Berita
        $posts = Post::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->take(3)
            ->get();

        // 2. Ambil Data Testimoni
        $testimonis = Testimoni::latest()->get();

        // 3. Ambil Data Galeri
        $galleries = Gallery::latest()->limit(6)->get();

        // 4. Ambil Data Pengurus
        $officers = Officer::orderBy('sort_order', 'asc')
        ->take(3) // Mengambil hanya 3 data teratas
        ->get();

        // 5. Kirim semua ke view
        return view('home', compact('posts', 'testimonis', 'galleries', 'officers'));
    }

    /**
     * METHOD BARU: Menampilkan Halaman Profil
     */
    public function indexProfile()
    {
        // Ambil semua data pengurus untuk ditampilkan di halaman profil
        $officers = Officer::orderBy('sort_order', 'asc')->get();

        // Pastikan nama file view sesuai (contoh: resources/views/profile.blade.php)
        return view('profile', compact('officers'));
    }

    /**
     * Menampilkan Daftar Berita
     */
    public function indexBerita()
    {
        $posts = Post::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->paginate(9);

        return view('posts.index', compact('posts'));
    }

    /**
     * Menampilkan Detail Berita
     */
    public function show($slug)
    {
        $post = Post::published()
            ->with(['category', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}