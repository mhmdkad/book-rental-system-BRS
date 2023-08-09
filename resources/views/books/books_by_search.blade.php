@extends('layouts.app')

@section('content')
    <div clas="container">
        <table>
            <thead>
                <tr>
                <th>Title</th><th>Author</th><th>Genre</th><th>Date of Publish</th>
                <th>number of pages</th><th>language</th><th>ISBN</th><th>In Stock</th>
                <th>Available Books</th><th>Description</th><th>Cover Image</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                <td> {{ $genre->title }} </td>               
                <td> {{ $genre->authors }} </td>
                <td> {{ $genre->Genre }} </td>
                <td> {{ $genre->description }} </td>
                <td> {{ $genre->released_at }} </td>
                <td> {{ $genre->cover_image }} </td>
                <td> {{ $genre->pages }} </td>
                <td> {{ $genre->language_code }} </td>
                <td> {{ $genre->isbn }} </td>
                <td> {{ $genre->in_stock }} </td>
                
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    
    title
    
    
    date of publish
    number of pages
    language
    ISBN number
    Number of this book in the library (in_stock)
    Number of available books (which are not borrowed)
    description
    cover image if it is given

  
@endsection