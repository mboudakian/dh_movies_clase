<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view('movies.index')->with('movies', $movies);
    }
 
    public function show($id){
        $movie = Movie::find($id);
        if(!$movie){
            return redirect()->back();
        }
        return view('movies.show')->with('movie', $movie);
    }

    public function create(){
        $genres = Genre::all();
        return view('movies.create')->with('genres', $genres);
    }

    public function store(Request $request){

        $reglas = [
            'title' => 'required',
            'rating'=> 'required',
            'awards'=> 'required',
            'length'=> 'required',
            'release_date' =>'required',
            'genre_id' => 'required'
        ];

        $mensaje = [
        'required' => 'el campo :attribute es obligatorio'];

        $this->validate($request, $reglas, $mensaje);

        $movie = new Movie([
            'title' => $request->input('title'),
            'rating' => $request->input('rating'),
            'awards' => $request->input('awards'),
            'length' => $request->input('length'),
            'release_date' => $request->input('release_date'),
            'genre_id' => $request->input('genre_id')
        ]);
            $movie->save();

           
             return redirect('/movies');
        
    }
}
