<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk kelas controller

use Illuminate\Http\Request; // Mengimpor kelas Request dari framework Laravel

class HomeController extends Controller // Mendefinisikan kelas HomeController yang meng-extends kelas Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() // Konstruktor kelas HomeController
    {
        $this->middleware('auth'); // Middleware 'auth' yang membatasi akses hanya untuk pengguna yang telah terotentikasi
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() // Metode index yang akan menampilkan halaman beranda
    {
        return view('home'); // Mengembalikan tampilan 'home' sebagai halaman beranda aplikasi
    }
}
