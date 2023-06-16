<div class="dropdown" id="stg">
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="background-color : white; border : none;"><i class="fa-solid fa-gear fa-spin" style="color: var(--main-color)"></i></button>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h3>Dashboard</h3>
        </div>
        <div class="offcanvas-body">
            <ul>
                <li> <a class="dropdown-item" href="{{ route('features.create') }}">Add new Feature</a> </li>
                <hr>
                <li>
                    <form action="{{ route('features.index') }}" method="GET">
                        @csrf
                        <select name="categorieSideBar" id="#" class="form-select" style="width: 95%; margin: 0 0 10px 7px;">
                            <option value="Croissant">Croissant</option>
                            <option value="bread">Bread</option>
                            <option value="Pancakes">Pancakes</option>
                            <option value="Cookies">Cookies</option>
                            <option value="Cake">Cake</option>
                            <option value="all">All</option>
                        </select>
                        <button class="dropdown-item" type="submit">filter</button>
                    </form>
                </li>
                <hr>
                <li>
                    <form action="{{ route('features.index') }}" method="GET">
                        @csrf
                        <input type="search" class="form-control" name="search" placeholder="Enter Name"  style="width: 95%; margin: 0 0 10px 7px;">
                        <button class="dropdown-item" type="submit">Search</button>
                    </form>
                </li>
                <hr>

            </ul>
        </div>
    </div>
  </div>
@extends('layouts.layout')
@section('title')
      Features
    @stop
@section('content')
<h1 class="Title"> All {{ $title }}</h1>
<section class="d-flex m-5">
    @if ($features->count() == 0)
        <h3 style='color : #DDD;'> {{$title}} Not Found ! </h3>
    @else
        @foreach ($features as $feature )
                <div class="card product" style="width: 18rem;">
                    <img src={{'/storage/'.$feature->photo}} class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ $feature->nom }}</h5>
                    <p class="card-text milieu">{{ $feature->recette }}</p>
                    <p class="card-text fw-bold">{{ $feature->categorie }}</p>
                    <p class="card-text">{{ $feature->prix }} $</p>
                    <footer class="card-footer d-flex justify-content-around">
                        <a href="{{ route('features.edit', $feature->id) }}" class="btn ">Edit</a>
                        <form action="{{ route('features.destroy', $feature->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button class="btn ">Delete</button>
                        </form>
                    </footer>
                    </div>
                </div>
        @endforeach
    @endif
</section>
@endsection
