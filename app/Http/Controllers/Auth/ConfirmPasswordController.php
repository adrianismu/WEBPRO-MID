<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords; // Menggunakan trait untuk meng-handle konfirmasi kata sandi

    /**
     * Where to redirect users when the intended URL fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME; // Alamat tujuan saat URL yang dimaksud gagal

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Menerapkan middleware 'auth' ke kontroller
    }
}
