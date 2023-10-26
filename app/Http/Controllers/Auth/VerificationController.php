<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails; // Menggunakan trait VerifiesEmails untuk meng-handle verifikasi email

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails; // Menggunakan trait VerifiesEmails yang menyediakan fungsionalitas verifikasi email

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME; // Mengarahkan pengguna ke lokasi tertentu setelah verifikasi email

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Memastikan pengguna harus sudah login
        $this->middleware('signed')->only('verify'); // Hanya menerapkan middleware 'signed' pada metode 'verify'
        $this->middleware('throttle:6,1')->only('verify', 'resend'); // Hanya menerapkan middleware 'throttle' pada metode 'verify' dan 'resend'
    }
}
