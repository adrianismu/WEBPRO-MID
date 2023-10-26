@extends('layouts.app') {{-- Memperluas tampilan dari layouts.app --}}

@section('content') {{-- Mendefinisikan bagian konten --}}
<div class="container"> {{-- Kontainer untuk konten halaman --}}
    <div class="row justify-content-center"> {{-- Baris untuk menengahkan konten --}}
        <div class="col-md-8"> {{-- Kolom dengan lebar 8 unit --}}
            <div class="card"> {{-- Kontainer kartu untuk formulir login --}}
                <div class="card-header">{{ __('Login') }}</div> {{-- Header kartu dengan pesan Login --}}

                <div class="card-body"> {{-- Tubuh kartu untuk konten utama --}}
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="row mb-3"> {{-- Baris dengan margin bawah --}}
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Kata Sandi') }}</label>
                            {{-- Label untuk input Kata Sandi dengan gaya tertentu --}}
                            <div class="col-md-6"> {{-- Kolom untuk input Kata Sandi --}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                {{-- Input Kata Sandi dengan kelas dinamis berdasarkan kesalahan dan atribut autocomplete --}}

                                @error('password') {{-- Memeriksa apakah terdapat kesalahan pada input Kata Sandi --}}
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> {{-- Menampilkan pesan kesalahan --}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3"> {{-- Baris dengan margin bawah --}}
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{-- Kotak centang untuk "Remember Me" dengan kondisi terkait dengan nilai yang diingat --}}

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0"> {{-- Baris tanpa margin bawah --}}
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa Kata Sandi?') }}
                                    </a>
                                @endif

                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __("Belum Punya Akun?") }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection {{-- Akhir dari bagian konten --}}
