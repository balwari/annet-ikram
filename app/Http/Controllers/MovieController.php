<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theatre;
use App\Models\Movie;
use Auth;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::paginate(10);
        return view('movies.home')->with('movies',$movies);
    }

    public function create(Request $request) {
        $movie = $request->validate([
            'movie_name' => 'required|string|max:100',
            'language' => 'required|string|max:100',
            'is_active' => 'required|string',
        ]);
        $create = Movie::create($movie);
        return redirect()->back();
    }
    
    public function getMovie($id) {
        $movie = Movie::find($id);
        return view('movies.form')->with('movie',$movie);
    }

    public function update($id, Request $req) {
        $movie = Movie::find($id);
        $movie->movie_name = $req->input('movie_name');
        $movie->language = $req->input('language');
        $movie->is_active = $req->input('is_active');
        $movie->save();
        return redirect()->route('movie-home');
    }
    public function delete($id) {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->back();
    }
}
