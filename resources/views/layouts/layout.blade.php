@php
    use App\Models\Message;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <link href="{{ url('./css/style.css') }}" rel="stylesheet">
    <link href="{{ url('css/all.min.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>

  <nav class="navbar navbar-expand-md HeadernotTransparent">
      <div class="container">
          <div id="logo">
              <img src="../images/logo.png" alt="photo">
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">

              </ul>
              <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex ">
                        <i class="fa-solid fa-house"></i>
                        <a class="nav-link" href="/">Home</a>
                    </li>
                      <li class="nav-item d-flex ">
                          <i class="fa-solid fa-store"></i>
                          <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                      </li>
                      <li class="nav-item d-flex ">
                          <i class="fa-solid fa-star fa-spin fa-spin-reverse"></i>
                          <a class="nav-link" href="{{ route('features.index') }}">Features</a>
                      </li>
                      <li class="nav-item d-flex ">
                          <i class="fa-solid fa-message"></i>
                          <div id="msg">{{Message::all()->count()}}</div>
                          <a class="nav-link" href="{{ route('messages.index') }}">Messages</a>
                      </li>
                      <li class="nav-item d-flex ">
                          <i class="fa-solid fa-bell fa-fade"></i>
                          <a class="nav-link" href="{{ route('commands.index') }}">Commands</a>
                      </li>
              </ul>
          </div>
      </div>
  </nav>
  {{-- message when do action (delete, edit add ..) --}}
  @if (session()->has('message'))
    <div class="alert alert-success text-center fw-bold mt-2 d-flex" role="alert">
      {{session()->get('message')}}
      <i class="fa-solid fa-check fa-bounce mx-2"  style='color : green; fontFamily : Fasthand'></i>
    </div>
  @endif

  <section>
    @yield('content')
  </section>
</body>
</html>
