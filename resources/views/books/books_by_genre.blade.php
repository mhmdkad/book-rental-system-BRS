@extends('layouts.app')

@section('content')
    <style>
        .title {font-weight: bolder;
                color: cadetblue;}
    </style>
    
    <div class="container">
        <h1 class="title"> {{ucwords($genre_name)}} </h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Publish</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td><a href="/books/{{ $book->id }}/show">{{ $book->title }}</a>  </td>               
                    <td> {{ $book->authors }} </td>
                    <td> {{ $book->description }} </td>
                    <td> {{ $book->released_at }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

  
@endsection