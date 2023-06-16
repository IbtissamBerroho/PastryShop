@php
    use Illuminate\Support\Str;
@endphp
@extends('layouts.layout')
@section('title')
Commands
@stop
@section('content')
<h1 class="Title"> All commands</h1>
<section class="d-flex m-5">
    @if ($commands->count() == 0)
        <h3 style='color : #DDD;'> Commands Not Found ! </h3>
    @else
        @foreach ($commands as $command )
                <div class="card product" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title"> <b>Name :</b> {{ $command->name }}</h5>
                    <p class="card-text"><b>Email :</b>{{ $command->email }}</p>
                    <p class="card-text"><b>Address :</b> {{ $command->Address }}</p>
                    <p class="card-text"><b>City :</b>  {{ $command->city }}</p>
                    <p class="card-text"><b>Card Number :</b>{{ $command->card_number }}</p>
                    <p class="card-text"><b> Date command :</b>{{ $command->date_command }}</p>
                    <p class="card-text"><b>Date reciept :</b>  {{ $command->date_reciept }}</p>
                    <b>products that demande :</b><textarea class="card-text" rows="10" cols="30">  {{Str::of($command->products)->between('[{' , '}]')}}</textarea>
                    <footer class="card-footer d-flex justify-content-around">
                        @if ($command->statut == 'non valid')
                            <a href="{{ route('commands.show', $command->id) }}" class="btn ">Valid</a>
                        @else
                            <button class="btn "><i class="fa-solid fa-check fa-bounce mx-2"  style='color : white; fontFamily : Fasthand'></i></button>
                        @endif
                        <form action="{{ route('commands.destroy', $command->id) }}" method="POST" style="margin: 0;">
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
