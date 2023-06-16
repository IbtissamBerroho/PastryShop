
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    @if (session()->has('message'))
      <div class="alert alert-success" role="alert">
        {{session()->get('message')}}
      </div>
    @endif
    <nav class="navbar navbar-expand-md" id="headerNotTransparent">
        <div class="container">
            <div id="logo">
                <img src="../images/logo.png" alt="photo">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                            <i class="fa-solid fa-message"></i>
                            @if (Message::all()->count() > 0)
                                <div id="msg">
                                    {{ Message::all()->count() }}
                                </div>
                            @endif
                            <a class="nav-link" href="{{ route('messages.index') }}">Messages</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav> --}}
@extends('layouts.layout')
@section('title')
      Add products
    @stop
@section('content')

    <section class="">
        <h1 class="Title">Add New Products</h1>
        <form class="w-50 mx-auto" id="formAddProduct" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="Name" class="form-label">Name :</label>
              <input type="text" class="form-control" id="Name" name="nom">
              @error('nom')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="recette" class="form-label">Recipe :</label>
              <textarea name="recette" id="recette" cols="30" rows="10" class="form-control">

              </textarea>
              @error('recette')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category :</label>
              <select  class="form-select" id="category" name="categorie">
                <option value="bread">Bread</option>
                <option value="Croissant">Croissant</option>
                <option value="Cookies">Cookies</option>
                <option value="Pancakes">Pancakes</option>
                <option value="Tartes">Tartes</option>
              </select>
              @error('categorie')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
              {{-- <input type="text" class="form-control" id="category" name="categorie"> --}}
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price :</label>
              <input type="text" class="form-control" id="price" name="prix">
              @error('prix')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="pic" class="form-label">Add photo :</label>
              <input type="file" class="form-control" id="pic" name="photo">
              @error('photo')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
            </div>
            <button type="submit" class="btn" >Add</button>
          </form>
    </section>
@endsection
{{-- </body>
</html> --}}
