@extends('layouts.app')
@section('style')
   <style>
     
     /* body{
       background-color: var(--trenta);
     } */
   </style>
@endsection
@section('content')
    
<header class="profilo">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 ">
        <h1 class="text-right text-white">{{$user->name}}</h1>
        <hr class="hrProfilo">
        <h5 class="text-right text-white">{{$user->email}}</h5>
      </div>
    </div>
  </div>
</header>

@if (session('updated.success'))
<div class="alert alert-success text-center">
    <h5>Modifica avvenuta con successo</h5>
</div>

@endif
@if (session('deleted.booking'))
<div class="alert alert-warning text-center">
    <h5>Prenotazione cancellata</h5>
</div>

@endif


<div class="container my-5 py-5">
    <div class="row">
      <div class="col-12 bg-custom">
      
      <h3 class=" text-center my-5 text10">Prenotazioni effettuate:</h3>
      
      </div>
        @foreach($bookings as $booking)
        <div class="col-12 col-md-4 mt-5">
            <div class="card border-custom mb-3 cardPrenotazioni" style="max-width: 400px;">
                
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="my-5">
                      <h5 class="card-title">Dove: <span class="h5 mx-5">{{$booking->location}}</span>
                      {{-- <small class="text-muted float-right"> {{$booking->type()->name}}</small> --}}</h5>
                      
                      <p class="card-text">Numero di persone: <span class="p mx-5">{{$booking->number}}</span></p>
                      <p class="card-text">Effettuata il: <span class="p mx-5">{{$booking->created_at->format('d/m/Y')}}</span></p>
                      </div>
                    <a class="btn btn-warning mx-auto d-block mb-1 float-right" href="{{route('edit', compact('booking'))}}">Modifica</a>
                      <a class="btn btn-danger mx-auto d-block" data-toggle="modal" data-target="#exampleModal">Cancella</a>
                    </div>
                  
              </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sei sicuro di voler cancellare la prenotazione?</h5>
                
              </div>
              <div class="modal-body">
              <form action="{{route('booking.delete', compact('booking'))}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Cancella</button>
              </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>


@if($user->is_manager == true)
 <div class="container my-5 py-5">
     <div class="row">
      <div class="col-12 bg-custom">
      
        <h3 class=" text-center my-5 text10">Lista attività:</h3>
        
      </div>
       <div class="table-responsive mt-5">
        <table class="table table-striped">
          <thead>
            <tr class="mx-auto">
              <th scope="col">Attività</th>
              <th scope="col">Gestisci</th>
              <th scope="col">Modifica</th>
              <th scope="col">Elimina</th>
            </tr>
          </thead>
          <tbody>
            @foreach($locations as $location)
            <tr>
              
              <td class="text-center text-dark">{{$location->name}}</td>
              <td><a class="btn btn-custom" href="{{route('manager.booking', [$location->name, $location->id])}}">Vedi prenotazioni</a></td>
              <td><a class="btn btn-warning" href="">Modifica</a></td>
              <td><a class="btn btn-danger" href="">Elimina attività</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
       </div>

         
         <div class="col-12 mt-5">
           <h3 class="text-center text-dark my-3"></h3>
         <span class="float-right"></span>

         </div>
        
     </div>
 </div>
@endif






<!-- Button trigger modal -->


<!-- Modal -->




@endsection