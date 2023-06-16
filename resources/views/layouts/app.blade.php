@php
 use App\Models\Message;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pastry Royal') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Open+Sans:wght@300&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,600&family=Saira+Condensed&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="{{ url('css/all.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        {{-- @if (Auth::check())
            <div class="dropdown" id="stg">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-target="#settingProducts" aria-expanded="false" style="background-color : white">
                <i class="fa-solid fa-gear fa-spin" style="color: var(--main-color)"></i>
            </button>
            <ul class="dropdown-menu" id="settingProducts">
                <li><a class="dropdown-item" href="{{ route('products.create') }}">Add new Product</a></li>
            </ul>
            </div>
        @endif --}}
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <div id="logo">
                    <img src="images/logo.png" alt="photo">
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @if (Auth::check())
                            <li class="nav-item d-flex ">
                                <i class="fa-solid fa-store"></i>
                                <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                            </li>
                            <li class="nav-item d-flex ">
                                <i class="fa-solid fa-message"></i>
                                @if ( Message::all()->count() > 0)
                                    <div id="msg">
                                        {{ Message::all()->count() }}
                                    </div>
                                @endif
                                <a class="nav-link" href="{{ route('messages.index') }}">Messages</a>
                            </li>
                        @endif
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item d-flex ">
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item d-flex">

                                    <i class="fa-solid fa-user-plus"></i>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
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
                </div>
            </div>
        </nav>
        <main class="py-4">
            <h1 class="Title">Royal Pastry</h1>
            @if (Auth::check())
                <h2 class="Title">Welcome To Main Page</h2>
            @endif
        </main>
    </div>
    <section class="products">
        @yield('content')
    </section>
</body>
</html>
