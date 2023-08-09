<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\book_genre;
use App\Models\Borrow;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function index()
    {
    }

    public function show($book_id)
    {
        // Number of books
        $book = Book::find($book_id);

        return view('books/show', [
            'book' => $book
            ]);
    }

    public function create()
    {
        // get all genre
        $genres = Genre::all();
        
        return view('books.create', [
            'genres' => $genres
            ]);
    }

    public function store(Request $request)
    {   
        
        $validated_data = $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'released_at' => 'required',
            'pages' => 'required',
            'isbn' => 'required',
            'description' => 'nullable',
            'in_stock' => 'required',
            'genres' => 'required',
        ]);
        
        // save book
        $book = Book::create($validated_data);
        $inserted_book_id = $book->id;
        
        $book_genres_records = [];
        foreach($request['genres'] as $genre_id){
            $book_genres_records[] = ['book_id'=>$inserted_book_id,
                                    'genre_id'=>$genre_id];
        }
        // dd($book_genres_records);
        // save to book_genres table
        book_genre::insert($book_genres_records);

        return redirect()->route('home_page');
    }

    public function edit($book_id)
    {
        // get genre name
        $book = Book::find($book_id);
        $genres_selected = book_genre::where('book_id' ,'=' ,$book_id)->pluck('genre_id')->toArray();

        // get all genre
        $genres = Genre::all();
        
        return view('books.edit', [
            'book' => $book,
            'genres' => $genres,
            'genres_selected' => $genres_selected
            ]);
    }

    public function update($book_id,Request $request)
    {
        // dd($request);
        $validated_data = $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'released_at' => 'required',
            'pages' => 'required',
            'isbn' => 'required',
            'description' => 'nullable',
            'in_stock' => 'required',
            'genres' => 'required',
        ]);
        
        // Edit book
        Book::find($book_id)->update($validated_data);

        
        $book_genres_records = [];
        foreach($request['genres'] as $genre_id){
            $book_genres_records[] = ['book_id'=>$book_id,
                                    'genre_id'=>$genre_id];
        }

        // delete previous genres from book_genre
        book_genre::where('book_id',$book_id)->delete();

        // save the new genres in book_genre table
        book_genre::insert($book_genres_records);

        return redirect()->route('book.show', ['book_id' => $book_id]);
    }

    public function destroy($book_id)
    {
        // $this->authorize('access', $book);
        $book = Book::find($book_id);
        // Project::destroy($id);
        $book->delete();
        return redirect()->route('home');
    }

    public function showBooksByGenre($genre_id)
    {
        
        // get genre name
        $genre = Genre::find($genre_id);
        $genre_name = $genre->name;

        
        // get books based on the returned that genre id
        $books = $genre->books;
    

        return view('books/books_by_genre', [
            'genre_name' => $genre_name,
            'books' => $books
            ]);
    }

    public function showBookDetail($book_id)
    {
        // get book by id
        $book = Book::find($book_id);
        $in_stock = $book->in_stock;

        // get genres of the book
        $genres = $book->genres;
        $genres_list = '';
        foreach($genres as $genre){
            $genres_list .= ','. $genre->name;
        }
        $genres_list = ltrim($genres_list, ', ');

        // get number of available books (not borrowed)
        $nb_av_books = $in_stock;
        $borrowed_books = Borrow::where('book_id', '=', $book_id)->where('status', '=', 'ACCEPTED')->count(0);
        $nb_av_books = $in_stock - $borrowed_books;
       
        //// for auth reader
        // check if reader has an on going rental for this book that is pending or accepted
        //// for auth librarian
        // show an edit book option

        $html = '';
        if (Auth::check()) {
            if (Auth::user()->is_librarian == 0){
                $id = Auth::id();
                
                if($id){
                    $last_request = Borrow::select('*')
                                        ->where('reader_id', '=', $id)
                                        ->where('book_id', '=', $book_id)
                                        ->orderBy('id', 'DESC')->first();
                
                    $status = 'ready';
                    if(isset($last_request)){
                        if($last_request->status == 'ACCEPTED' || $last_request->status =='PENDING'){
                            $status = 'running';
                        }
            
                        $html = "";
                        if ($status == 'running'){
                            $html = '<b style="font-style: italic;color: darkgoldenrod;font-size: large;"> Rental in process... </b>';
                        }else{
                            $html = '<b> Rent the book </b>
                                    <a href="'. route('rentals.create', ['book_id' => $book_id]). '" class="btn btn-success">Borrow</a>';
                        }
                    }else{
                        $html = '<b> Borrow the book </b>
                                 <a href="'. route('rentals.create', ['book_id' => $book_id]). '" class="btn btn-success">Borrow</a>';
                    }
                    
                }
            }else{
                $html = '<a href="'. route('books.edit', ['book_id' => $book_id]). '" class="btn btn-secondary">Edit</a>';
            }
        }
        
        
        

        // get book genres 
        return view('books/book_detail', [
            'book' => $book,
            'genres_list' => $genres_list,
            'nb_av_books' => $nb_av_books,
            'html' => $html
            ]);
    }

}
