@extends('layouts.layout')
@section('title')
      Edit products
    @stop
@section('content')
    <section >
        <h1 class="Title">Edit Product</h1>
        <form class="w-50 mx-auto" id="formAddProduct" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="Name" class="form-label">Name :</label>
              <input type="text" class="form-control" id="Name" name="nom" value='{{ $product->nom }}'>
            </div>
            @error('nom')
                <p style="color: red; font-weight: bold;">{{ $message }}</p>
            @enderror
            <div class="mb-3">
              <label for="recette" class="form-label">Recipe :</label>
              <textarea name="recette" id="recette" cols="30" rows="10" class="form-control">
                {{ $product->recette }}
              </textarea>
              @error('recette')
                <p style="color: red; font-weight: bold;">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category :</label>
              <input type="text" class="form-control" id="category" name="categorie" value={{ $product->categorie }}>
              @error('categorie')
                <p style="color: red; font-weight: bold;">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price :</label>
              <input type="text" class="form-control" id="price" name="prix" value={{ $product->prix }}>
              @error('prix')
                <p style="color: red; font-weight: bold;">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="pic" class="form-label">Add photo :</label>
              <input type="file" class="form-control" id="pic" name="photo" value={{ $product->photo }}>
              @error('photo')
                <p style="color: red; font-weight: bold;">{{ $message }}</p>
              @enderror
            </div>
            <button type="submit" class="btn" >Edit</button>
          </form>
    </section>
@endsection
