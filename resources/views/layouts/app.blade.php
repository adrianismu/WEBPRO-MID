<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Campus Mart</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> <!-- Menambahkan link ke stylesheet Tailwind CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) <!-- Mungkin ini adalah asset build tool seperti Vite -->
</head>
<body>
    <div class="bg-white">
        <header class="bg-blue-500 text-white px-6 py-2">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex items-center">
                    <!-- Navigasi Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item sm:mx-3 sm:mt-0" href="/">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav center">
                        <li class="nav-item sm:mx-3 sm:mt-0" href="/">
                            <a class="nav-link" href="{{ route('product.list')}}">{{ __('Store') }}</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav center">
                        <li class="nav-item sm:mx-3 sm:mt-0" href="/">
                            <a class="nav-link" href="{{ route('product.index')}}">{{ __('View Product(Admin)') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center">
                    <!-- Navigasi User dan Keranjang -->
                    <ul class="navbar-nav ms-center flex items-center">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item sm:mx-3 sm:mt-0">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <ul class="navbar-nav ms-center flex items-center">
                        <li class="sm:mx-3 sm:mt-0">
                            <a href="{{ route('cart.list') }}" class="flex items-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span style="color: white;">{{ Cart::getTotalQuantity() }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        
        <main class="my-8">
            @yield('content') <!-- Mengisi konten utama dari template yang lain -->
        </main>
    </div>
</body>
</html>
