@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    

 <div class="container my-5 py-5">
     <div class="row">
         <div class="col-12 text-center">Profilo Utente</div>
     </div>
 </div>
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
        <h3>{{$user->name}}</h3>
        <h3>{{$user->email}}</h3>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
        @foreach($bookings as $booking)
        <div class="col-12 col-md-6">
            <div class="card border-custom mb-3 cardPrenota" style="max-width: 400px;">
                
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="my-5">
                      <h5 class="card-title">Dove: <span class="h5 mx-5">{{$booking->location}}</span>
                      {{-- <small class="text-muted float-right"> {{$booking->type()->name}}</small> --}}</h5>
                      
                      <p class="card-text text-center">Numero di persone: {{$booking->number}}</p>
                      </div>
                      <a href="#" class="btn btn-danger mx-auto d-block ">Cancella</a>
                    </div>
                  
              </div>
        </div>
        @endforeach
    </div>
</div>


@if($user->is_manager == true)
 <div class="container my-5 py-5">
     <div class="row">
         @foreach($locations as $location)
         <div class="col-12">
         <h3>{{$location->name}}</h3>
         <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Vedi prenotazioni</button>
         </div>
         @endforeach
     </div>
 </div>
@endif

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prenotazioni</h5>
        </div>
        <div class="modal-body">
          @foreach($bookings as $booking)
          
        <h4>{{$booking->name}}</h4>
        <h4>{{$booking->number}}</h4>
        <p class="float-right">{{$booking->created_at}}</p>
        
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
         
        </div>
      </div>
    </div>
  </div>

@endsection