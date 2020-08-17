@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
<body class="sfondo">
    
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-9 col-md-7 col-lg-9 my-5 py-5">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h3 class="card-title text-center">Modifica dettagli attività</h3>
            <form class="py-3 px-5 my-5" method="POST" action="{{route('manager.update', compact('location'))}}">
                @method('PUT')
                @csrf
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
                <input name="name" type="text" class="form-control inputborder2 w-100" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$location->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Indirizzo</label>
                  <input name="location" type="text" class="form-control inputborder2 w-100" id="exampleInputPassword1" value="{{$location->location}}">
                </div>
                <div class="form-group my-5">
                    <label for="exampleInputPassword1">Descrizione</label>
                    <textarea name="description" type="password" class="form-control border-custom" id="exampleInputPassword2" value="{{$location->description}}">{{$location->description}}</textarea>
                  </div>
                <button type="submit" class="btn btn-custom d-block mx-auto">Modifica</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection