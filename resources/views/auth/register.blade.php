@extends('layouts.app') {{-- Memperluas tampilan dari layouts.app --}}

@section('content') {{-- Mendefinisikan bagian konten --}}
<div class="container"> {{-- Kontainer untuk konten halaman --}}
    <div class="row justify-content-center"> {{-- Baris untuk menengahkan konten --}}
        <div class="col-md-8"> {{-- Kolom dengan lebar 8 unit --}}
            <div class="card"> {{-- Kontainer kartu untuk formulir pendaftaran --}}
                <div class="card-header">{{ __('Daftar') }}</div> {{-- Header kartu dengan pesan Daftar --}}

                <div class="card-body"> {{-- Tubuh kartu untuk konten utama --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf {{-- Token CSRF untuk keamanan --}}

                        <div class="row mb-3"> {{-- Baris dengan margin bawah --}}
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            {{-- Label untuk input Nama dengan gaya tertentu --}}
                            <div class="col-md-6"> {{-- Kolom untuk input Nama --}}
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                {{-- Input Nama dengan kelas dinamis berdasarkan kesalahan, nilai sebelumnya, dan atribut autocomplete --}}

                                @error('name') {{-- Memeriksa apakah terdapat kesalahan pada input Nama --}}
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> {{-- Menampilkan pesan kesalahan --}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3"> {{-- Baris dengan margin bawah --}}
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Email') }}</label>
                            {{-- Label untuk input Alamat Email dengan gaya tertentu --}}
                            <div class="col-md-6"> {{-- Kolom untuk input Alamat Email --}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                {{-- Input Alamat Email dengan kelas dinamis berdasarkan kesalahan, nilai sebelumnya, dan atribut autocomplete --}}

                                @error('email') {{-- Memeriksa apakah terdapat kesalahan pada input Alamat Email --}}
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> {{-- Menampilkan pesan kesalahan --}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3"> {{-- Baris dengan margin bawah --}}
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Kata Sandi') }}</label>
                            {{-- Label untuk input Kata Sandi dengan gaya tertentu --}}
                            <div class="col-md-6"> {{-- Kolom untuk input Kata Sandi --}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                {{-- Input Kata Sandi dengan kelas dinamis berdasarkan kesalahan dan atribut autocomplete --}}

                                @error('password') {{-- Memeriksa apakah terdapat kesalahan pada input Kata Sandi --}}
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> {{-- Menampilkan pesan kesalahan --}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3"> {{-- Baris dengan margin bawah --}}
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Konfirmasi Kata Sandi') }}</label>
                            {{-- Label untuk input Konfirmasi Kata Sandi dengan gaya tertentu --}}
                            <div class="col-md-6"> {{-- Kolom untuk input Konfirmasi Kata Sandi --}}
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                {{-- Input Konfirmasi Kata Sandi dengan atribut autocomplete --}}
                            </div>
                        </div>

                        <div class="row mb-0"> {{-- Baris tanpa margin bawah --}}
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection {{-- Akhir dari bagian konten --}}
