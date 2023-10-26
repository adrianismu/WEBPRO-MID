@extends('layouts.app') <!-- Meng-extend tampilan dari file 'layouts.app' -->

@section('content') <!-- Bagian konten dari halaman -->
<div class="container"> <!-- Container utama -->
    <div class="row justify-content-center"> <!-- Baris yang terpusatkan secara horizontal -->
        <div class="col-md-8"> <!-- Kolom dengan lebar medium sesuai dengan bootstrap (8/12) -->
            <div class="card"> <!-- Kartu atau panel -->
                <div class="card-header">{{ __('Dashboard') }}</div> <!-- Judul kartu atau panel -->

                <div class="card-body"> <!-- Isi dari kartu atau panel -->
                    @if (session('status'))
                        <!-- Cek apakah ada pesan status di sesi -->
                        <div class="alert alert-success" role="alert">
                            <!-- Kotak peringatan sukses -->
                            {{ session('status') }}
                            <!-- Menampilkan pesan status -->
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <!-- Pesan "You are logged in!" -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
