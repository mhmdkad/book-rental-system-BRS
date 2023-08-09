@extends('layouts.app')

@section('content')
    <style>
        .float_left {float: right;}
    </style>

    <div class="container">
        <h1> List of Genres </h1>
        <a href="{{ route('genres.create') }}" class="btn btn-primary float_left">Add</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th><th>Style</th><th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td> {{ $genre->name }} </td>
                    <td> {{ $genre->style }} </td>
                    <td style="width: 12%;">
                        <a href="{{ route('genres.edit', ['genre_id' => $genre->id]) }}" class="btn btn-secondary">Edit</a>                    
                        <form action="{{ route('genres.destroy', ['genre_id' => $genre->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

  
@endsection