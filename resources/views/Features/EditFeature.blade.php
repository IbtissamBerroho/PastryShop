@extends('layouts.layout')
@section('title')
      Edit Feature
@stop
@section('content')

    <section class="">
        <h1 class="Title">Add New Feature</h1>
        <form class="w-50 mx-auto" id="formAddProduct" action="{{ route('features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="Name" class="form-label">Name :</label>
              <input type="text" class="form-control" id="Name" name="nom" value="{{ $feature->nom }}">
              @error('nom')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="recette" class="form-label">Recipe :</label>
              <textarea name="recette" id="recette" cols="30" rows="10" class="form-control">
                {{ $feature->recette }}
              </textarea>
              @error('recette')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category :</label>
              <select  class="form-select" id="category" name="categorie" value="{{ $feature->categorie }}">
                <option value="bread">Bread</option>
                <option value="Croissant">Croissant</option>
                <option value="Cookies">Cookies</option>
                <option value="Pancakes">Pancakes</option>
                <option value="Cakes">Cakes</option>
              </select>
              @error('categorie')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
              {{-- <input type="text" class="form-control" id="category" name="categorie"> --}}
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price :</label>
              <input type="text" class="form-control" id="price" name="prix" value="{{ $feature->prix }}">
              @error('prix')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="pic" class="form-label">Add photo :</label>
              <input type="file" class="form-control" id="pic" name="photo" value="{{ $feature->photo }}">
              @error('photo')
                <p style="color: red; font-weight : bold;"> {{ $message }}</p>
              @enderror
            </div>
            <button type="submit" class="btn" >Edit</button>
          </form>
    </section>
@endsection
