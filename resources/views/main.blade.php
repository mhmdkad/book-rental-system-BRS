@extends('layouts.app')

@section('content')
  <style>
    .badge{background-color: white; color: black;}
  </style>
  
  <div class="container" >
    <h1>Welcome to <b> BRS </b> </h1>
    <br>
   
    <button type="button" class="btn btn-warning">
      Users Count <span class="badge badge-light">{{ $nb_users }}</span>
    </button>

    <button type="button" class="btn btn-success">
      Genres Count <span class="badge badge-light">{{ $nb_genres }}</span>
    </button>

    <button type="button" class="btn btn-danger">
      Books Count <span class="badge badge-light">{{ $nb_books }}</span>
    </button>

    <button type="button" class="btn btn-primary">
      Active Rentals <span class="badge badge-light">{{ $nb_act_books }}</span>
    </button>
    <br><br>

    <div class="row">
    @foreach ($genres as $genre)
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <img src="{{ asset('images/genres.png') }}" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
            <p class="card-text"><h3>{{ ucfirst($genre->name) }}</h3></p>
            <a href="/genre/{{$genre->id}}/show" class="btn btn-primary">Browse</a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
      
      
    
  </div>

@endsection