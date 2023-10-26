<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Menggunakan HasApiTokens, HasFactory, dan Notifiable untuk model User

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Kolom yang dapat diisi: nama pengguna
        'email', // Kolom yang dapat diisi: alamat email
        'password', // Kolom yang dapat diisi: kata sandi
        'role', // Kolom yang dapat diisi: peran pengguna
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Kolom yang harus disembunyikan dalam respons serialisasi: kata sandi
        'remember_token', // Kolom yang harus disembunyikan dalam respons serialisasi: remember_token
    ];
}
