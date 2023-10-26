<?php

namespace App\Http\Controllers;

use Validator; // Mengimpor kelas Validator
use App\Http\Controllers\Controller; // Mengimpor kelas Controller
use Illuminate\Http\Request; // Mengimpor kelas Request
use App\Models\Product; // Mengimpor model Product

class ProductController extends Controller // Mendefinisikan kelas ProductController yang meng-extends kelas Controller
{
    public function index(Request $request) // Metode index untuk menampilkan daftar produk
    {
        $products = Product::paginate(10); // Mengambil daftar produk dengan pembagian halaman
        return view('products.index', ['products' => $products]); // Menampilkan tampilan 'products.index' dengan data produk
    }

    public function productList() // Metode productList untuk menampilkan daftar produk tanpa pembagian halaman
    {
        $products = Product::all(); // Mengambil semua produk
        return view('products.store', ['products' => $products]); // Menampilkan tampilan 'products.store' dengan data produk
    }

    public function create() // Metode create untuk menampilkan tampilan pembuatan produk
    {
        return view('products.create'); // Menampilkan tampilan 'products.create'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Metode store untuk menyimpan produk yang baru dibuat
    {
        $dataProduct = new Product; // Membuat instance model Product

        $rules = [ // Aturan validasi data produk yang akan disimpan
            'name' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'descriptions' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules); // Membuat objek Validator dengan aturan validasi

        if ($validator->fails()) { // Jika validasi gagal, kirim respons JSON dengan pesan kesalahan
            return response()->json([
                'status' => false,
                'message' => 'failed to store',
                'data' => $validator->errors(),
            ]);
        }

        // Menyimpan data produk ke dalam database
        $dataProduct->name = $request->name;
        $dataProduct->category = $request->category;
        $dataProduct->qty = $request->qty;
        $dataProduct->price = $request->price;
        $dataProduct->descriptions = $request->descriptions;
        $post = $dataProduct->save();
        
        return redirect(route('product.index')); // Mengarahkan kembali ke halaman daftar produk setelah berhasil menyimpan
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) // Metode show untuk menampilkan detail produk
    {
        $data = Product::find($id); // Mencari produk berdasarkan ID

        if ($data) { // Jika produk ditemukan, kirim respons JSON dengan data produk
            return response()->json([
                'status' => true,
                'message' => 'data ditemukan',
                'data' => $data,
            ], 200);
        } else { // Jika produk tidak ditemukan, kirim respons JSON dengan pesan kesalahan
            return response()->json([
                'status' => false,
                'message' => 'data tidak ditemukan',
            ]);
        }
    }

    public function edit(Product $product) // Metode edit untuk menampilkan tampilan pengeditan produk
    {
        return view('products.edit', ['product' => $product]); // Menampilkan tampilan 'products.edit' dengan data produk yang akan diedit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) // Metode update untuk menyimpan perubahan pada produk
    {
        $dataProduct = Product::find($id); // Mencari produk berdasarkan ID

        if (empty($dataProduct)) { // Jika produk tidak ditemukan, kirim respons JSON dengan kode status 404
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $rules = [ // Aturan validasi data produk yang akan diubah
            'name' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'descriptions' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules); // Membuat objek Validator dengan aturan validasi

        if ($validator->fails()) { // Jika validasi gagal, kirim respons JSON dengan pesan kesalahan
            return response()->json([
                'status' => false,
                'message' => 'failed to update',
                'data' => $validator->errors(),
            ]);
        }

        // Menyimpan perubahan pada data produk ke dalam database
        $dataProduct->name = $request->name;
        $dataProduct->category = $request->category;
        $dataProduct->qty = $request->qty;
        $dataProduct->price = $request->price;
        $dataProduct->descriptions = $request->descriptions;
        $post = $dataProduct->save();

        return redirect(route('product.index'))->with('success', 'Product Updated Succesffully'); // Mengarahkan kembali ke halaman daftar produk dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) // Metode destroy untuk menghapus produk
    {
        $dataProduct = Product::find($id); // Mencari produk berdasarkan ID

        if (empty($dataProduct)) { // Jika produk tidak ditemukan, kirim respons dengan pesan kesalahan
            return redirect(route('product.index'))->with('error', 'Product not found');
        }

        $dataProduct->delete(); // Menghapus produk dari database

        return redirect(route('product.index'))->with('success', 'Product deleted successfully'); // Mengarahkan kembali ke halaman daftar produk dengan pesan sukses
    }
}
