
    <div class="dropdown" id="stg">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="background-color : white; border : none;"><i class="fa-solid fa-gear fa-spin" style="color: var(--main-color)"></i></button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h3>Dashboard</h3>
            </div>
            <div class="offcanvas-body">
                <ul>
                    <li> <a class="dropdown-item" href="{{ route('products.create') }}">Add new Product</a> </li>
                    <hr>
                    <li>
                        <form action="{{ route('products.index') }}" method="GET">
                            @csrf
                            <select name="categorieSideBar" id="#" class="form-select" style="width: 95%; margin: 0 0 10px 7px;">
                                <option value="Croissant">Croissant</option>
                                <option value="bread">Bread</option>
                                <option value="Pancakes">Pancakes</option>
                                <option value="Cookies">Cookies</option>
                                <option value="Tartes">Tartes</option>
                                <option value="all">All</option>
                            </select>
                            <button class="dropdown-item" type="submit">filter</button>
                        </form>
                    </li>
                    <hr>
                    <li>
                        <form action="{{ route('products.index') }}" method="GET">
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
      All products
    @stop
    @section('content')
        <div id="details-Products">
            <div>all products : {{ $allproducts->count() }}</div>
            <div>cookies : {{ $cookProducts->count() }}</div>
            <div>bread : {{ $breadProducts->count() }}</div>
            <div>Pancakes : {{ $pancProducts->count() }} </div>
            <div>croissants : {{ $croiProducts->count() }} </div>
            <div>
                <a class="btn" href="products/show">Show Trashd : <i class="fa-solid fa-trash fa-beat"></i></a>
            </div>
        </div>
        <h1 class="Title">{{ $title }}</h1>
        <div class="d-flex">
            @if ($allproducts->count() == 0)
                <h3 style='color : #DDD;'> {{$title}} Not Found ! </h3>
            @else
                @foreach ($allproducts as $product)
                    <div class="card product" style="width: 18rem;">
                        <img src={{"/storage/".$product->photo}} class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $product->nom }}</h5>
                        <p class="card-text milieu">{{ $product->recette }}</p>
                        <p class="card-text fw-bold">{{ $product->categorie }}</p>
                        <p class="card-text">{{ $product->prix }} $</p>
                        <footer class="card-footer d-flex justify-content-around">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn ">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button class="btn ">Delete</button>
                            </form>
                        </footer>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endsection















