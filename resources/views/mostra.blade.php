@extends('layouts.app')
@section('style')
   <style>
     
     /* body{
       background-color: var(--trenta);
     } */
   </style>
@endsection
@section('content')
    
<header class="mostra">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 ">
        <h1 class="text-center text-white">{{$location->name}}</h1>
      </div>
    </div>
  </div>
</header>

<div class="container my-5 py-5">
    <div class="row">

        <div class="col-md-8">
          @foreach ($location->images as $image)
          <img class="img-fluid" src="{{Storage::url($image->file)}}" alt="">
          @endforeach
          
        </div>
    
        <div class="col-md-4">
          <h3 class="my-3">Descrizione</h3>
          <p>{{$location->description}}</p>
          @if($location->user_id != Auth::user()->id)
          <button class="btn btn-custom my-3">Prenota</button>
         @endif
          <h5 class="my-3">{{$location->location}}</h5>
          <div style="width: 300px;position: relative;"><iframe width="300" height="300" src="https://maps.google.com/maps?width=300&amp;height=500&amp;hl=en&amp;q=Via%20principe%20di%20piemonte%2C%20potenza%2C%20italy+(Crossfit%20all%20you%20want)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="http://www.googlemapsgenerator.com/da/">googlemapsgen (da)</a> & <a href="https://iamsterdamcard.it/">iamsterdamcard it</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />
        </div>
    
      </div>
      @if(Auth::user()->is_manager && $location->user_id == Auth::user()->id)
      <a class="btn btn-warning mt-3 px-5" href="{{route('manager.edit', compact('location'))}}">Modifica</a>
      <a class="btn btn-danger float-right mt-3 px-4" href="">Elimina attività</a>
      @endif
</div>






<!-- Button trigger modal -->


<!-- Modal -->





@endsection