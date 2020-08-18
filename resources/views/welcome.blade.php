@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    


<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-left mt-5 pt-5">
          <h1 class="font-weight-light text10">I<span class="h1 text-white">Prenoto</span></h1>
          <p class="lead text-white">il portale per gesitre le <span class="p text10">tue prenotazioni</span></p>
        </div>
      </div>
    </div>
</header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-3 over  d-flex justify-content-center align-itens-center flex-column mx-4">
            <h2 class="text-center text-white">2Mila</h2>
            <hr>
            <h2 class="text-center text-white">Utenti</h2>
        </div>
        <div class="col-12 col-md-3 over  d-flex justify-content-center align-itens-center flex-column mx-4">
            <h2 class="text-center text-white">3Cento</h2>
            <hr>
            <h2 class="text-center text-white">Attività</h2>
        </div>
        <div class="col-12 col-md-3 over  d-flex justify-content-center align-itens-center flex-column mx-4">
            <h2 class="text-center text-white">+5Mila</h2>
            <hr>
            <h2 class="text-center text-white">Prenotazioni</h2>
        </div>
    </div>
</div>
@if (session('booking.confirmation'))
    <div class="alert alert-success text-center">
        <h5>Prenotazione avvenuta con successo</h5>
    </div>
    
@endif
@if (session('manager.access.denied'))
    <div class="alert alert-danger text-center">
      <h5>Acesso consentito solo ai gestori di Attività</h5>

    </div>
    
@endif
<div class="container-fluid mt-3 pt-3 who">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="text-right text-white mt-5 mr-5 ">Chi Siamo</h3>
            <hr>
            <p class="text-right text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam vitae dignissimos non beatae nemo illum, aliquid reiciendis.</p>
            <p class="text-right text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam vitae dignissimos non beatae nemo illum, aliquid reiciendis.</p>
            <p class="text-right text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam vitae dignissimos non beatae nemo illum, aliquid reiciendis.</p>
            <p class="text-right text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam vitae dignissimos non beatae nemo illum, aliquid reiciendis.</p>
            <p class="text-right text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam vitae dignissimos non beatae nemo illum, aliquid reiciendis.</p>
        </div>
    </div>
</div>

<div class="container-fluid mb-5 pb-3">
    <div class="row mt-5 pt-5">
        @foreach($types as $type)
        <div class="col-12 arrow  d-flex justify-content-center align-itens-center flex-column my-2" data-aos="fade-right" data-aos-duration="3000">
            <h3 class="text-center text-white ">{{$type->name}}</h3>
        </div>
        <div class="col-12  d-flex justify-content-center align-itens-center flex-column my-2" data-aos="fade-left" data-aos-duration="3000">
        <a href="{{route('elenco', [$type->name , $type->id])}}" class="h3 arrow2 textHover text-center pt-4">Vai all'elenco</a>
        </div>
        @endforeach
        {{-- <div class="col-12  arrow  d-flex justify-content-center align-itens-center flex-column my-2" data-aos="fade-right" data-aos-duration="3000">
            <h3 class="text-center text-white ">Ristoranti</h3>
        </div>
        <div class="col-12  d-flex justify-content-center align-itens-center flex-column my-2" data-aos="fade-left" data-aos-duration="3000">
                <a href="" class=" h3  textHover arrow2 text-center pt-4">Vai all'elenco</a>
        </div>
        <div class="col-12  arrow  d-flex justify-content-center align-itens-center flex-column my-2" data-aos="fade-right" data-aos-duration="3000">
            <h3 class="text-center text-white ">Palestre</h3>
        </div>
        <div class="col-12  d-flex justify-content-center align-itens-center flex-column my-2" data-aos="fade-left" data-aos-duration="3000">
           <a href="" class=" h3  textHover arrow2 text-center pt-4">Vai all'elenco</a>
        </div> --}}
    </div>
</div>

<div class="container-fluid mt-5 pt-5 mobile">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center align-items-center">
            <h3 class="text-center text-white">Provalo da <span class="h3 text10">mobile</span></h3>
            <div class="d-flex justify-content-center align-items-center">
            <a href="" class="mx-auto"><img src="/media/google-play-badge.png" alt="" height="55px"></a>
            <a href="" class="mx-auto "><img src="/media/appstore.png" alt="" height="40px"></a>  
            </div>
        </div>
    </div>
</div>



@endsection