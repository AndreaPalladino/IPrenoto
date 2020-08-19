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
                  <select name="location" id="inputState" class="form-control">
                    @foreach ($locations as $location)
                    <option  value="{{$location->name}}" {{old('type') == $location->id ? 'selected' : ''}}>{{$location->name}}
                    </option>
                        @endforeach
                </select>
                  {{-- <input name="location" type="text" class="form-control" id="inputLocation" placeholder="Hotel Miramare"> --}}
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
        <div class="col-2">
          <div class="nav  nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Palestre</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Hotel</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Ristoranti</a>
          </div>
        </div>
        <div class="col-10">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
             {{--  @if ($locations->type == 2) --}}
              @foreach($locations_1 as $location)
              <div class="card border-custom mb-3 cardPrenota" style="max-width: 560px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="{{$location->images->first()->getUrl(300,150)}}" class="card-img" alt="...">
                 
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$location->name}}<small class="text-muted float-right"> {{$location->type->name}}</small></h5>
                      
                      <p class="card-text">{{$location->description}}</p>
                      <p class="card-text"><small class="text-muted">{{$location->location}}</small></p>
                      <a href="{{route('show', compact('location'))}}" class="btn btn-custom mx-auto d-block">Info</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              {{-- @endif --}}
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              @foreach($locations_2 as $location)
              <div class="card border-custom mb-3 cardPrenota" style="max-width: 560px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    
                    <img src="{{$location->images->first()->getUrl(300,150)}}" class="card-img" alt="...">
                 
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$location->name}}<small class="text-muted float-right"> {{$location->type->name}}</small></h5>
                      
                      <p class="card-text">{{$location->description}}</p>
                      <p class="card-text"><small class="text-muted">{{$location->location}}</small></p>
                      <a href="{{route('show', compact('location'))}}" class="btn btn-custom mx-auto d-block">Info</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              @foreach($locations_3 as $location)
              <div class="card border-custom mb-3 cardPrenota" style="max-width: 560px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="{{$location->images->first()->getUrl(300,150)}}" class="card-img" alt="...">
                 
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$location->name}}<small class="text-muted float-right"> {{$location->type->name}}</small></h5>
                      
                      <p class="card-text">{{$location->description}}</p>
                      <p class="card-text"><small class="text-muted">{{$location->location}}</small></p>
                      <a href="{{route('show', compact('location'))}}" class="btn btn-custom mx-auto d-block">Info</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
   <div class="col-12 col-md-6 position-sticky frame">
    <div style="width: 700px;position: relative;"><iframe width="700" height="440" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=italy+(Titolo)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="http://www.googlemapsgenerator.com/it/">Googlemapsgenerator.com/it/</a> & <a href="https://iamsterdamcard.it/">iamsterdamcard it</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />
   </div>











       
    
  </div>
</div>


</section>
    
@endsection