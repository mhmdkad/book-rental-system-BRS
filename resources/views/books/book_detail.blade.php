@extends('layouts.app')

@section('content')
    
    <style>
        .title {font-weight: bolder;
                color: cadetblue;}
        td:nth-child(2) {padding: 3px 0px 13px 60px;
            font-size: large;}
        .cvr_img {height: 414px;}
    </style>
    
    <div class="container">
        <h1 class="title"> Book Details</h1>
        <br><br>
        <div class="row">
            <div class="col-6">
                <table class="">
            
                    <tbody>
                        <tr>
                            <td><b>Title</b></td>
                            <td>{{ $book->title }}</td>
                        </tr>
                        <tr>
                            <td><b>Author</b></td>
                            <td>{{ $book->authors }}</td>
                        </tr>
                        <tr>
                            <td><b>Genre</b></td>
                            <td>{{ $genres_list }}</td>
                        </tr>
                        <tr>
                            <td><b>Date of Publish</b></td>
                            <td>{{ $book->released_at }}</td>
                        </tr>
                        <tr>
                            <td><b>Number of Pages</b></td>
                            <td>{{ $book->pages }}</td>
                        </tr>
                        <tr>
                            <td><b>Language</b></td>
                            <td>{{ $book->language_code }}</td>
                        </tr>
                        <tr>
                            <td><b>ISBN</b></td>
                            <td>{{ $book->isbn }}</td>
                        </tr>
                        <tr>
                            <td><b>In Stock</b></td>
                            <td>{{ $book->in_stock }}</td>
                        </tr>
                        <tr>
                            <td><b>Available Books</b></td>
                            <td>{{ $nb_av_books }}</td>
                        </tr>
                        <tr>
                            <td><b>Description</b></td>
                            <td>{{ $book->description }}</td>
                        </tr>
                        

                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <img class='cvr_img' src="{{asset('images/book-cover.png')}}"></img>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                {!! $html !!}
                @auth
                    @if (Auth::user()->is_librarian == 1)
                    <form action="{{ route('books.destroy', ['book_id' => $book->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </form>
                    @endif
                @endauth
            </div>

        </div>
        
        
    </div>

  
@endsection