@extends('layouts.layout')
@section('title')
      Trash
    @stop
@section('content')
<h1 class="Title"> Trashed</h1>
<section class="d-flex m-5">
@if ($Trasheds->count() == 0)
<h3 style='color : #DDD; text-align: center; margin-top: 100px;'> Nothing in the trash ! </h3>

@else
    @foreach ( $Trasheds as $product )
        <div class="card product" style="width: 18rem;">
            <img src={{"/storage/".$product->photo}} class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">{{ $product->nom }}</h5>
            <p class="card-text milieu">{{ $product->recette }}</p>
            <p class="card-text fw-bold">{{ $product->categorie }}</p>
            <p class="card-text">{{ $product->prix }} $</p>
            <footer class="card-footer d-flex justify-content-around">
                <form action="{{ route('products.restore', $product->id) }}" method="GET" style="margin: 0;">
                    @csrf
                    <button class="btn" >Restore</button>
                </form>
            </footer>
            </div>
        </div>
    @endforeach
@endif
</section>
@endsection
