<?php

namespace App\Http\Controllers;
use App\Actor;
use App\Movie;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(){
        $actors = Actor::all();
        return view('actors.index')->with('actors', $actors);
    }
 
    public function show($id){
        $actor = Actor::find($id);
        if(!$actor){
            return redirect()->back();
        }
        return view('actors.show')->with('actor', $actor);
    }

    public function create(){
        $movies = Movie::all();
        return view('actors.create')->with('movies', $movies);
    }
    public function store(Request $request){

        $reglas = [
            'first_name' => 'required',
            'last_name'=> 'required',
            'rating'=> 'required',
            'favorite_movie_id' => 'required'
        ];

        $mensaje = [
        'required' => 'el campo :attribute es obligatorio'];

        $this->validate($request, $reglas, $mensaje);

        $actor = new Actor(
            $request->all());
            $actor->save();

           
             return redirect('/actors');
        
    }
}
