@extends('layouts.app') {{-- Memperluas tampilan dari layouts.app --}}

@section('content') {{-- Mendefinisikan bagian konten --}}
<div class="container"> {{-- Kontainer untuk konten halaman --}}
    <div class="row justify-content-center"> {{-- Baris untuk menengahkan konten --}}
        <div class="col-md-8"> {{-- Kolom dengan lebar 8 unit --}}
            <div class="card"> {{-- Kontainer kartu untuk verifikasi alamat email --}}
                <div class="card-header">{{ __('Verifikasi Alamat Email Anda') }}</div>
                {{-- Header kartu dengan pesan Verifikasi Alamat Email Anda --}}

                <div class="card-body"> {{-- Tubuh kartu untuk konten utama --}}
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi baru telah dikirimkan ke alamat email Anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.') }}
                    {{ __('Jika Anda tidak menerima email tersebut') }},

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf {{-- Token CSRF untuk keamanan --}}
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini untuk meminta yang lain') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection {{-- Akhir dari bagian konten --}}
