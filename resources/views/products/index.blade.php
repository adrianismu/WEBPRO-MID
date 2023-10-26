@extends('layouts.app') <!-- Meng-extend tampilan dari file 'layouts.app' -->

@section('content') <!-- Bagian konten dari halaman -->
<div class="text-center">
    <a class="btn btn-primary mb-4" href="{{ route('product.create') }}">{{ __('Add a Product') }}</a> <!-- Tombol untuk menambahkan produk baru -->

    <div style="margin: 20px auto; max-width: 85%;">
        <table class="w-full border-2 border-collapse border-blue-500 hover:shadow-md" style="font-size: 18px;"> <!-- Tabel untuk menampilkan daftar produk -->
            <tr class="bg-blue-500 text-white"> <!-- Baris header tabel -->
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            @foreach ($products as $product) <!-- Loop melalui daftar produk -->
            <tr class="bg-gray-100 hover:bg-gray-200 transition-colors"> <!-- Baris untuk setiap produk -->
                <td>{{$product->id}}</td> <!-- Kolom ID produk -->
                <td>{{$product->name}}</td> <!-- Kolom Nama produk -->
                <td>{{$product->category}}</td> <!-- Kolom Kategori produk -->
                <td>{{$product->qty}}</td> <!-- Kolom Kuantitas produk -->
                <td>{{$product->price}}</td> <!-- Kolom Harga produk -->
                <td>{{$product->descriptions}}</td> <!-- Kolom Deskripsi produk -->
                <td><img width="80px" src="{{URL('images')}}/{{$product->image}}"></td> <!-- Kolom Gambar produk -->

                <td class="flex justify-center items-center">
                    <form method="GET" action="{{route('product.edit', ['product' => $product])}}">
                        @csrf
                        <button type="submit" class="btn btn-success">Edit</button> <!-- Tombol Edit produk -->
                    </form>

                    <form method="POST" action="{{route('product.delete', ['product' => $product])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-2">Delete</button> <!-- Tombol Hapus produk -->
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="flex justify-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }} <!-- Pagination untuk daftar produk -->
        </div>
    </div>
</div>
@endsection
