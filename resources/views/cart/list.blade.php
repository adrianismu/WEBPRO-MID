@extends('layouts.app') {{-- Memperluas tampilan dari layouts.app --}}

@section('content') {{-- Mendefinisikan bagian konten --}}
<main class="my-8"> {{-- Bagian utama konten --}}
    <div class="container px-6 mx-auto"> {{-- Kontainer dengan margin horizontal --}}
        <div class="flex justify-center my-6"> {{-- Fleksibel untuk penempatan tengah --}}
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                {{-- Kontainer fleksibel untuk elemen-elemen dalam halaman --}}
                @if ($message = Session::get('success'))
                <div class="p-4 mb-3 bg-green-400 rounded">
                    <p class="text-green-800">{{ $message }}</p>
                </div>
                @endif
                <h3 class="text-3xl font-bold mb-4">Daftar Keranjang</h3> {{-- Judul halaman --}}
                <div class="flex-1"> {{-- Bagian isi halaman --}}
                    <table class="w-full text-sm lg:text-base" cellspacing="0"> {{-- Tabel daftar keranjang --}}
                        <thead>
                            <tr class="h-12 uppercase"> {{-- Baris header --}}
                                <th class="hidden md:table-cell"></th> {{-- Kolom tersembunyi untuk sel gambar --}}
                                <th class="text-left">Nama</th> {{-- Kolom Nama --}}
                                <th class="pl-5 text-left lg:text-right lg:pl-0">Kuantitas</th> {{-- Kolom Kuantitas --}}
                                <th class="hidden text-right md:table-cell">Harga</th> {{-- Kolom Harga (tersembunyi) --}}
                                <th class="hidden text-right md:table-cell">Hapus</th> {{-- Kolom Hapus (tersembunyi) --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item) {{-- Melakukan perulangan untuk setiap item dalam keranjang --}}
                            <tr>
                                <td class="hidden pb-4 md:table-cell"> {{-- Kolom tersembunyi untuk sel gambar --}}
                                    <a href="#">
                                        {{-- <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail"> --}}
                                    </a>
                                </td>
                                <td> {{-- Kolom Nama --}}
                                    <a href="#">
                                        <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                    </a>
                                </td>
                                <td class="justify-center mt-6 md:justify-end md:flex"> {{-- Kolom Kuantitas --}}
                                    <div class="h-10 w-28">
                                        <div class="relative flex flex-row w-full h-8">
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf {{-- Token CSRF untuk keamanan --}}
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-6 text-center bg-gray-300" />
                                                <button type="submit" class="px-2 ml-2 text-white bg-blue-500">Perbarui</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden text-right md:table-cell"> {{-- Kolom Harga (tersembunyi) --}}
                                    <span class="text-sm font-medium lg:text-base">
                                        Rp. {{ $item->price }}
                                    </span>
                                </td>
                                <td class="hidden text-right md:table-cell"> {{-- Kolom Hapus (tersembunyi) --}}
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf {{-- Token CSRF untuk keamanan --}}
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="px-4 py-2 text-white bg-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end items-center mt-6"> {{-- Bagian bawah untuk total dan menghapus keranjang --}}
                        <div class="text-left pr-6">
                            <span class="text-lg font-semibold">Total Kuantitas: {{ Cart::getTotalQuantity() }}</span>
                        </div>
                        <div class="text-right pr-6">
                            <span class="text-lg font-bold">Total: Rp. {{ Cart::getTotal() }}</span>
                        </div>
                        <div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf {{-- Token CSRF untuk keamanan --}}
                                <button class="px-6 py-2 text-red-800 bg-red-300 rounded-lg">Hapus Semua Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection {{-- Akhir dari bagian konten --}}
