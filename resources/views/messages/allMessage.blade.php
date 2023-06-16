
@extends('layouts.layout')
@if (session()->has('deleted'))
    <div class="alert alert-success text-center fw-bold mt-2 d-flex" role="alert">
      {{session()->get('deleted')}}
      <i class="fa-solid fa-check fa-bounce mx-2"  style='color : green; fontFamily : Fasthand'></i>
    </div>
  @endif
@section('title')
      Messages
    @stop
@section('content')
    <section class="d-flex p-5">
        @if (count($messages)>0)
            @foreach ($messages as $message)
            <div class="card mx-1" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title"><span style="color : var(--main-color), font-weight : bold">Name :</span>  {{$message->nom}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Email : {{$message->email}}</h6>
                <p class="card-text"> Comment : {{ $message->comment }}</p>
                <form action="{{ route('messages.destroy', $message->id) }} " method="POST">
                    @csrf
                    @method('DELETE')
                    <button href="" class="btn text-light" type="submit">Delete</button>
                </form>
                </div>
            </div>
            @endforeach
        @else
        <p class="my-5"> There is no messages ! </p>
        @endif
    </section>
@endsection

