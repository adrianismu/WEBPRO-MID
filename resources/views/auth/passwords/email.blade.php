@extends('layouts.app') {{-- Memperluas tampilan dari layouts.app --}}

@section('content') {{-- Mendefinisikan bagian konten --}}
<div class="container"> {{-- Kontainer untuk konten halaman --}}
    <div class="row justify-content-center"> {{-- Baris untuk menengahkan konten --}}
        <div class="col-md-8"> {{-- Kolom dengan lebar 8 unit --}}
            <div class="card"> {{-- Kontainer kartu untuk formulir --}}
                <div class="card-header">{{ __('Atur Ulang Kata Sandi') }}</div> {{-- Header kartu dengan pesan Atur Ulang Kata Sandi --}}

                <div class="card-body"> {{-- Tubuh kartu untuk konten utama --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf {{-- Token CSRF untuk keamanan --}}

                        <div class="row mb-3"> {{-- Baris dengan margin bawah --}}
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Email') }}</label>
                            {{-- Label untuk input Alamat Email dengan gaya tertentu --}}
                            <div class="col-md-6"> {{-- Kolom untuk input Alamat Email --}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                {{-- Input Alamat Email dengan kelas dinamis berdasarkan kesalahan, nilai sebelumnya, dan atribut autocomplete --}}

                                @error('email') {{-- Memeriksa apakah terdapat kesalahan pada input Alamat Email --}}
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> {{-- Menampilkan pesan kesalahan --}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0"> {{-- Baris tanpa margin bawah --}}
                            <div class="col-md-6 offset-md-4"> {{-- Kolom dengan offset untuk penempatan tombol --}}
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim Tautan Atur Ulang Kata Sandi') }}
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
