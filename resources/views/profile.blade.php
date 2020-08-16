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
         <div class="col-12 text-center">
           <h1 class="text-center text-white">Profilo Utente</h1>
          </div>
     </div>
 </div>
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body border-custom">
              <h2 class="text-center mb-3 ">Info di contatto:</h2>
              <hr>
              <h3 class="text-center">{{$user->name}}</h3>
              <h3 class="text-center">{{$user->email}}</h3>
            </div>
          </div>
        
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
      <div class="col-12">
      <h3 class="text-center mb-5 text-white">Prenotazioni effettuate:</h3>
      </div>
        @foreach($bookings as $booking)
        <div class="col-12 col-md-4">
            <div class="card border-custom mb-3 cardPrenota" style="max-width: 400px;">
                
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="my-5">
                      <h5 class="card-title">Dove: <span class="h5 mx-5">{{$booking->location}}</span>
                      {{-- <small class="text-muted float-right"> {{$booking->type()->name}}</small> --}}</h5>
                      
                      <p class="card-text text-center">Numero di persone: {{$booking->number}}</p>
                      <p class="card-text text-center">Effettuata il: {{$booking->created_at}}</p>
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
      <div class="col-12">
        <h3 class="text-center mb-5 text-white">Lista Prenotazioni:</h3>
        </div>
         @foreach($locations as $location)
         <div class="col-12 bookForm2">
         <h3 class="text-center my-3 text-white">{{$location->name}}</h3>
         <button class="btn btn-custom mx-auto d-block" data-toggle="modal" data-target="#exampleModal">Vedi prenotazioni</button>
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
          <h5 class="modal-title text-center font-weight-bold mx-auto" id="exampleModalLabel">Prenotazioni</h5>
        </div>
        <div class="modal-body">
         
          @foreach($prenotazioni as $p)
           
         
        <h5>Intestatario prenotazione: <span class="h5 float-right">{{$p->name}}</span></h5>
        <h5>Numero di persone: <span class="h5 float-right">{{$p->number}}</span></h5>
        <h5>Prenotazione effettuata il: <span class="h5 float-right">{{$p->created_at}}</span></h5>
        <hr class="mb-5">
          @endforeach
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary mx-auto d-block" data-dismiss="modal">Chiudi</button>
         
        </div>
      </div>
    </div>
  </div>

@endsection