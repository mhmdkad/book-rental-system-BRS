@extends('layouts.app')

@section('content')
    <div class="container py-3">
      <h2>Edit a Book</h2>
      <form action="{{ route('books.update', ['book_id' => $book->id]) }}" method="POST">
        {{-- HTTP: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS,  --}}
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label for="title">Book title</label>
          <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="" maxlength="255"
            value="{{ old('title', $book->title) }}">
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="authors">Auther</label>
          <input name="authors" type="text" class="form-control @error('authors') is-invalid @enderror" id="authors" placeholder="" maxlength="255"
            value="{{ old('authors', $book->authors) }}">
          @error('authors')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="released_at">Release Date</label>
          <input type="date" name="released_at" class="form-control @error('released_at') is-invalid @enderror" id="released_at" 
             value="{{ old('released_at', $book->released_at) }}">
          @error('released_at')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="pages">Book Pages</label>
          <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" id="pages" 
          value="{{ old('pages', $book->pages) }}">
          @error('pages')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="isbn">ISBN</label>
          <input name="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" placeholder=""
            value="{{ old('isbn', $book->isbn) }}">
          @error('isbn')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <input name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="" maxlength="255"
            value="{{ old('description', $book->description) }}">
          @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="in_stock">In Stock</label>
          <input type="number" name="in_stock" class="form-control @error('in_stock') is-invalid @enderror" id="in_stock" 
          value="{{ old('in_stock', $book->in_stock) }}">
          @error('in_stock')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
            <label for="genres">Genres</label></br>
        @foreach ($genres as $genre)
            @if(in_array($genre->id, $genres_selected))   
            <input type="checkbox" name="genres[]" checked value="{{ $genre->id }}">
            @else
            <input type="checkbox" name="genres[]" value="{{ $genre->id }}">
            @endif
            <label for="genres"> {{ $genre->name }}</label>
        @endforeach
          @error('genres')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
        </br>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Edit book</button>
        </div>

      </form>
    </div>

@endsection