@extends('layouts.app')
@section('style')
    
@endsection
@section('content')

<section class="booking">

<div class="container">
    <div class="row">
        <div class="col-12 bookForm my-5">
            <h1 class="text-center text-white mt-5">Prenota</h1>
            <hr>
            <form action="" method="post">
                @csrf

            </form>
        </div>
    </div>
</div>




</section>
    
@endsection