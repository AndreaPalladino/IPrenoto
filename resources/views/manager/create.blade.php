@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
<body class="sfondo">
    @if (session('location.created'))
    <div class="alert alert-success text-center">
        <h5>Attività caricata con successo!</h5>
    </div>
    
@endif
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-9 col-md-7 col-lg-9 my-5 py-5">
          <div class="card card-signin my-5">
            <div class="card-body altezza">
              <h3 class="card-title text-center">Registra la tua attività</h3>
            <form class="py-3 px-5 my-5" method="POST" action="{{route('manager.store')}}">
                @csrf
                <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                <div class="form-group">
                    <label class="text-dark" for="inputState">Tipologia</label>
                    <select id="inputState" class="form-control border-custom" name="type">
                        @foreach ($types as $type)
                        <option value="{{$type->id}}" {{old('type') == $type->id ? 'selected' : ''}}>{{$type->name}}
                        </option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nome</label>
                  <input name="name" type="text" class="form-control inputborder2 w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Indirizzo</label>
                  <input name="location" type="text" class="form-control inputborder2 w-100" id="exampleInputPassword1">
                </div>
                <div class="form-group my-5">
                    <label for="exampleInputPassword1">Descrizione</label>
                    <textarea name="description" type="password" class="form-control border-custom" id="exampleInputPassword2"></textarea>
                </div>
                <div class="form-group my-5">
                  <label for="images">Immagini</label>
                
                    <div class="dropzone" id="drophere"></div>
              
                </div>
                <button type="submit" class="btn btn-custom d-block mx-auto">Registra</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection