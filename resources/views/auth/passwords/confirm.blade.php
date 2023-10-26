@extends('layouts.app') {{-- Meng-extend tampilan dari app.blade.php --}}

@section('content') {{-- Mendefinisikan bagian konten --}}
<div class="container"> {{-- Kontainer untuk konten halaman --}}
    <div class="row justify-content-center"> {{-- Baris untuk menengahkan konten --}}
        <div class="col-md-8"> {{-- Kolom sedang dengan lebar 8 unit --}}
            <div class="card"> {{-- Kontainer kartu untuk formulir --}}
                <div class="card-header">{{ __('Konfirmasi Kata Sandi') }}</div> {{-- Header kartu dengan pesan konfirmasi --}}

                <div class="card-body"> {{-- Tubuh kartu untuk konten utama --}}
                    {{ __('Harap konfirmasi kata sandi Anda sebelum melanjutkan.') }} {{-- Menampilkan pesan konfirmasi --}}

                    <form method="POST" action="{{ route('password.confirm') }}"> {{-- Formulir untuk konfirmasi kata sandi dengan metode POST --}}
                        @csrf {{-- Token CSRF untuk keamanan --}}

                        <div class="row mb-3"> {{-- Baris dengan margin bawah --}}
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Kata Sandi') }}</label>
                            {{-- Label untuk input kata sandi dengan gaya tertentu --}}
                            <div class="col-md-6"> {{-- Kolom untuk input kata sandi --}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                {{-- Input kata sandi dengan kelas dinamis berdasarkan kesalahan, nama, dan atribut autocomplete --}}

                                @error('password') {{-- Memeriksa apakah ada kesalahan untuk input kata sandi --}}
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> {{-- Menampilkan pesan kesalahan --}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0"> {{-- Baris tanpa margin bawah --}}
                            <div class="col-md-8 offset-md-4"> {{-- Kolom dengan offset untuk penempatan tombol --}}
                                <button type="submit" class="btn btn-primary"> {{-- Tombol Submit --}}
                                    {{ __('Konfirmasi Kata Sandi') }} {{-- Teks tombol --}}
                                </button>

                                @if (Route::has('password.request')) {{-- Memeriksa apakah rute untuk reset kata sandi ada --}}
                                    <a class="btn btn-link" href="{{ route('password.request') }}"> {{-- Tautan untuk reset kata sandi --}}
                                        {{ __('Lupa Kata Sandi?') }} {{-- Teks tautan --}}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form> {{-- Akhir dari formulir --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection {{-- Akhir dari bagian konten --}}
