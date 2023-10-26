@extends('layouts.app') <!-- Meng-extend tampilan dari file 'layouts.app' -->

@section('content') <!-- Bagian konten dari halaman -->
    <div style="text-align: center;">
        <h1>Edit a Product</h1> <!-- Judul untuk mengedit produk -->
        <form method="POST" action="{{route('product.update', ['product' => $product])}}" enctype="multipart/form-data"> <!-- Form untuk mengirim pembaruan produk -->
            @csrf <!-- Token CSRF untuk keamanan form -->
            @method('put') <!-- Menggunakan metode PUT untuk pembaruan data -->
            <div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-lg"> <!-- Container untuk elemen formulir -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label> <!-- Label untuk nama produk -->
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded-md" placeholder="Name" value="{{$product->name}}" required> <!-- Input field untuk nama produk -->
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label> <!-- Label untuk kategori produk -->
                    <select id="category" name="category" class="w-full p-2 border rounded-md" required> <!-- Dropdown untuk memilih kategori produk -->
                        @foreach(json_decode('{"Susu":"Susu", "Kopi":"Kopi", "Minyak":"Minyak", "Parfum":"Parfum", "Snack":"Snack", "Sabun":"Sabun", "Shampo":"Shampo"}', true) as $optionKey => $optionValue)
                        <option value="{{$optionKey}}" {{ $optionKey == $product->category ? 'selected' : '' }}>{{$optionValue}}</option> <!-- Opsi untuk setiap kategori -->
                        @endforeach
                    </select>
                </div>

                <!-- Input fields untuk kuantitas, harga, dan deskripsi produk -->
                <div class="mb-4">
                    <label for="qty" class="block text-gray-700 text-sm font-bold mb-2">Qty</label>
                    <input type="text" id="qty" name="qty" class="w-full p-2 border rounded-md" placeholder="Qty" value="{{$product->qty}}" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                    <input type="text" id="price" name="price" class="w-full p-2 border rounded-md" placeholder="Price" value="{{$product->price}}" required>
                </div>

                <div class="mb-4">
                    <label for="descriptions" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <input type="text" id="descriptions" name="descriptions" class="w-full p-2 border rounded-md" placeholder="Description" value="{{$product->descriptions}}" required>
                </div>

                <!-- Field untuk memilih gambar produk dan menampilkan gambar saat ini -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" required> <!-- Field untuk memilih file gambar -->
                    <img class="mt-2" width="20%" src="{{URL('images')}}/{{$product->image}}" alt="Product Image" /> <!-- Menampilkan gambar produk saat ini -->
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button> <!-- Tombol untuk mengirimkan pembaruan -->
                </div>
            </div>
        </form>
    </div>
@endsection
