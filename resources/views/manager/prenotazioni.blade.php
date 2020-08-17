@extends('layouts.app')
@section('style')
    
@endsection
@section('content')

<div class="container my-5 py-5">
    <div class="row">

      <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        
                        <th scope="col">Nome</th>
                        <th scope="col">N° persone</th>
                        <th scope="col">Data</th>
                        <th scope="col">Gestisci</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                      <tr>
                        
                        
                        <td>{{$booking->name}}</td>
                        <td>{{$booking->number}}</td>
                        <td>{{$booking->created_at->format('d/m/Y')}}</td>
                        <td><a class="btn btn-danger" href="" data-toggle="modal" data-target="#exampleModal">Cancella prenotazione</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
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
    
@endsection