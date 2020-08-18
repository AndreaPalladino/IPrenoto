@extends('layouts.app')
@section('style')
    
@endsection
@section('content')

<header class="elenco">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 ">
          <h1 class="text-left text-white">{{$type->name}}</h1>
        </div>
      </div>
    </div>
  </header>
  
@if($locations->isNotEmpty())
<div class="container my-5 py-5">
    <div class="row">
        @foreach($locations as $location)
        <div class="col-md-7 my-3">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
          </a>
        </div>
        <div class="col-md-5 my-3">
        <h3>{{$location->name}}</h3>
        <h5>{{$location->type->name}}</h5>
        <p>{{$location->description}}</p>
        @if(Auth::user())
        <a class="btn btn-custom px-5 mt-5" href="{{route('show', compact('location'))}}">Info</a>
        @else
        <p class="text-center">*Per vedere i dettagli bisogna essere loggati*</p>
        @endif
        </div>
        <hr>
        @endforeach

    </div>
</div>
@else
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
        <h2 class="text-center">Non ci sono attività per l acategoria {{$type->name}}</h2>
        </div>
    </div>
</div>
@endif
    
@endsection