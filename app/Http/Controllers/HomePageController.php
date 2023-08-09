<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index()
    {
        
        // Number of users in the system
        $nb_users = User::get()->count();

        // Number of genres
        $genres = Genre::get();
        $nb_genres = $genres->count();

        // Number of books
        $nb_books = Book::get()->count();

        // Number of active book rentals (in accepted status)
        $nb_act_books = Borrow::where('status', '=', 'ACCEPTED')->get()->count();

        // List of genres. Each list item must be a link, referring to the List by genre page.
        $genres;

        // Search for books. See Search.


        return view('main', [
            'nb_users' => $nb_users,
            'nb_genres' => $nb_genres,
            'nb_books' => $nb_books,
            'nb_act_books' => $nb_act_books,
            'genres' => $genres,
            ]);
    }
}
