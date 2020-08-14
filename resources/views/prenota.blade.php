@extends('layouts.app')
@section('style')
    
@endsection
@section('content')

<div class="spazio"></div>
<section class="booking">

<div class="container">
    <div class="row">
        <div class="col-12 bookForm my-5">
            <h1 class="text-center text-white mt-5">Prenota</h1>
            <hr>
        <form method="POST" action="{{route('booking.store')}}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="text-white" for="inputNamel4">Nome e Cognome</label>
                    <input name="name" type="text" class="form-control" id="inputname">
                  </div>
                  <div class="form-group col-md-4">
                    <label class="text-white" for="inputState">Tipologia</label>
                    <select id="inputState" class="form-control">
                        @foreach ($types as $type)
                        <option value="{{$type->id}}" {{old('type') == $type->id ? 'selected' : ''}}>{{$type->name}}
                        </option>
                            @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="text-white" for="inputLocation">Nome del luogo</label>
                  <input name="location" type="text" class="form-control" id="inputLocation" placeholder="Hotel Miramare">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label  class="text-white" for="inputEmail">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail">
                  </div>
                  <div class="form-group col-md-4">
                    <label class="text-white" for="inputNumber">Persone</label>
                    <input name="number" type="number" class="form-control" id="inputNumber" min="1">
                  </div>
                  
                </div>
                
                <button type="submit" class="btn btn-custom mx-auto d-block mt-5">Prenota</button>
              </form>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
  <div class="row">
    <div class="col-12 col-md-6">
        @foreach($locations as $location)
        <div class="card border-custom mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="http://placehold.it/300x350" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$location->name}}<small class="text-muted float-right"> {{$location->type->name}}</small></h5>
                
                <p class="card-text">{{$location->description}}</p>
                <p class="card-text"><small class="text-muted">{{$location->location}}</small></p>
                <a href="#" class="btn btn-custom mx-auto d-block">Info</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</div>


</section>
    
@endsection