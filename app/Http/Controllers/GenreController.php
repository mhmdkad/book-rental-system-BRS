<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    
    public function index()
    {
    }

    public function show()
    {
    }

    public function show_genres()
    {
        
        $genres = Genre::all();

        return view('genres/show', [
            'genres' => $genres
            ]);
    }

    public function create()
    {
        $styles = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        return view('genres.create',['styles' => $styles]);
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'style' => 'required'
        ]);
        
        // save genre
        Genre::insert($validated_data);
        
        return redirect()->route('genres.show');
    }

    public function edit($genre_id)
    {
        // get genre by id
        $genre = Genre::find($genre_id);

        $styles = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return view('genres.edit', [
            'genre' => $genre,
            'styles' => $styles
            ]);
    }

    public function update($genre_id, Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'style' => 'required'
        ]);
        
        // Update genre
        Genre::find($genre_id)->update($validated_data);
        
        return redirect()->route('genres.show');
    }

    public function destroy($genre_id)
    {
        // $this->authorize('access', $book);
        $genre = Genre::find($genre_id);
        // Project::destroy($id);
        $genre->delete();
        return redirect()->route('genres.show');
    }

    
}
