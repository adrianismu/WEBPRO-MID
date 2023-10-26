@extends('layouts.app') <!-- Meng-extend tampilan dari file 'layouts.app' -->

@section('content') <!-- Bagian konten dari halaman -->
<div class="container mx-auto mt-12"> <!-- Container utama dengan margin atas -->
    <h1 class="text-4xl font-semibold text-center">Welcome to Campus Mart</h1> <!-- Judul halaman -->
    <p class="text-lg text-center mt-4">Explore our products.</p> <!-- Paragraf deskripsi -->
    <div class="text-center mt-8">
        <a href="{{ route('product.list') }}" class="btn btn-primary">View Products</a>
        <!-- Tombol untuk melihat daftar produk -->
    </div>
</div>
@endsection
