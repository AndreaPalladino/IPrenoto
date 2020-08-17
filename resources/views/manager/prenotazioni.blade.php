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
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                      <tr>
                        
                        
                        <td>{{$booking->name}}</td>
                        <td>{{$booking->number}}</td>
                        <td>{{$booking->created_at->format('d/m/Y')}}</td>

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
      </div>
       
        {{-- @foreach($bookings as $booking)
        <div class="col-12">
            <h5>Intestatario prenotazione: <span class="h5 float-right"></span></h5>
            <h5>Numero di persone: <span class="h5 float-right"></span></h5>
            <h5>Prenotazione effettuata il: <span class="h5 float-right"></span></h5>
            <hr class="mb-5">
        </div>
        @endforeach --}}
    </div>
</div>


    
@endsection