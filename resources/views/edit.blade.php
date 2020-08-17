@extends('layouts.app')
@section('style')
   <style>
       body{
           background-color: var(--trenta);
       }
  </style> 
@endsection
@section('content')
    
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 bookForm my-5">
            <h1 class="text-center text-white mt-5">Prenota</h1>
            <hr>
        <form method="POST" action="{{route('booking.update', compact('booking'))}}">
               @method('PUT')
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="text-white" for="inputNamel4">Nome e Cognome</label>
                  <input name="name" type="text" class="form-control" id="inputname" value="{{$booking->name}}">
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
                  <input name="location" type="text" class="form-control" id="inputLocation" placeholder="Hotel Miramare" value="{{$booking->location}}">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label  class="text-white" for="inputEmail">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" value="{{$booking->email}}">
                  </div>
                  <div class="form-group col-md-4">
                    <label class="text-white" for="inputNumber">Persone</label>
                    <input name="number" type="number" class="form-control" id="inputNumber" min="1" value="{{$booking->number}}">
                  </div>
                  
                </div>
                
                <button type="submit" class="btn btn-custom mx-auto d-block mt-5">Modifica</button>
              </form>
        </div>
    </div>
</div>






@endsection