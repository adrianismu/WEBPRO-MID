@extends('layouts.app') <!-- Meng-extend tampilan dari file 'layouts.app' -->

@section('content') <!-- Bagian konten dari halaman -->
    <div class="container px-6 mx-auto"> <!-- Container utama -->
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3> <!-- Judul halaman -->
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <!-- Grid untuk menampilkan daftar produk -->
            @foreach ($products as $product) <!-- Loop melalui daftar produk -->
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <!-- Container untuk setiap produk -->
                {{-- <img src="{{ url($product->image) }}" alt="" class="w-full max-h-60"> --}}
                <!-- Gambar produk (sumber gambar di atas dihapus) -->
                <div class="flex items-end justify-end w-full bg-cover">
                    <!-- Bagian yang belum diisi dengan gambar -->
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <!-- Nama produk -->
                    <span class="mt-2 text-gray-500">Rp. {{ $product->price }}</span>
                    <!-- Harga produk -->
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form untuk menambahkan produk ke keranjang -->
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                        <!-- Tombol "Add To Cart" -->
                    </form>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
@endsection
