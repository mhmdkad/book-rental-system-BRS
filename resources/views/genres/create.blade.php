@extends('layouts.app')

@section('content')
    <div class="container py-3">
      <h2>New Genre</h2>
      <form action="{{ route('genres.store') }}" method="POST">
        {{-- HTTP: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS,  --}}
        @csrf
        
        <div class="form-group">
          <label for="name">Name</label>
          <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" maxlength="255"
            value="{{ old('name', '') }}">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="style" >Style</label>
          <select name="style" class="form-control @error('style') is-invalid @enderror" id="style">
            @foreach($styles as $style)
              @if($style == old('style', ''))
              <option value="{{$style}}" selected="selected">{{$style}}</option>
              @else
              <option value="{{$style}}">{{$style}}</option>
              @endif
            @endforeach
          </select>

          @error('style')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        </br>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add new Genre</button>
        </div>

      </form>
    </div>

@endsection