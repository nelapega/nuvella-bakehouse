<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama (Landing Page) publik.
     * Mengambil data kategori dan produk unggulan menggunakan relasi Eloquent.
     */
    public function index()
    {
        $categories = Category::withCount('products')->get();

        $featuredProducts = Product::with('category')
            ->available()
            ->featured()
            ->latest()
            ->take(6)
            ->get();

        $latestProducts = Product::with('category')
            ->available()
            ->latest()
            ->take(8)
            ->get();

        return view('pages.home', compact('categories', 'featuredProducts', 'latestProducts'));
    }

    /**
     * Halaman Tentang Kami (Profil PT Nuvella Pangan Sejahtera & Nuvella Bakehouse).
     */
    public function about()
    {
        $categories = Category::all();
        $totalProducts = Product::available()->count();

        return view('pages.about', compact('categories', 'totalProducts'));
    }

    /**
     * Halaman Kontak & Lokasi Nuvella Bakehouse.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Proses kirim pesan/pertanyaan dari pengunjung.
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'subject.required' => 'Subjek pesan wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
        ]);

        return redirect()->route('contact')->with('success', 'Terima kasih, pesan Anda telah berhasil dikirim! Tim Nuvella Bakehouse akan segera menghubungi Anda.');
    }
}
