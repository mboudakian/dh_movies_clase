<?php

namespace App\Http\Controllers;
use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        return view('genres.index')->with('genres', $genres);
    }
 
    public function show($id){
        $movies = Movie::where('genre_id', $id)->get();
        $genre = Genre::find($id);
        if(!$genre){
            return redirect()->back();
        }
        return view('genres.show')->with('genre', $genre)
                                  ->with('movies', $movies);
    }

}
