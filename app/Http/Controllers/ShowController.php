<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theatre;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Show;
use Auth;

class ShowController extends Controller
{
    public function index() {
        $shows = Show::paginate(10);
        $theatres = Theatre::select('id','name')->get();
        return view('shows.home')->with('shows',$shows)->with('theatres',$theatres);
    }

    public function showGetTheatre(Request $request) {
        $theatre = $request->validate([
            'theatre_id' => 'required|integer|exists:theatres,id',
        ]);
        $showtimes = Showtime::where('theatre_id',$request->theatre_id)->get();
        $theatre = Theatre::where('id',$request->theatre_id)->first();
        $movies = Movie::where('is_active','Active')->get();
       return view('shows.home1')->with('showtimes',$showtimes)
        ->with('theatre',$theatre)
        ->with('movies',$movies);
    }

    public function create(Request $request) {
        $show = $request->validate([
            'theatre_id' => 'required|integer|exists:theatres,id',
            'showtime_id' => 'required|integer|exists:showtimes,id',
            'movie_id' => 'required|integer|exists:movies,id',
            'start_date' => 'required',
        ]);
         $theatre_name = Theatre::where('id',$request->theatre_id)->select('name')->first();
         $show['theatre_name'] = $theatre_name['name'];
         $showtime_name = Showtime::where('id',$request->showtime_id)->select('name')->first();
         $show['showtime_name'] = $showtime_name['name'];
         $movie_name = Movie::where('id',$request->movie_id)->select('movie_name')->first();
         $show['movie_name'] = $movie_name['movie_name'];
        $create = Show::create($show);
        return redirect()->route('show-home');
    }
    
    public function getshow($id) {
        $show = Show::find($id);
        $showtimes = Showtime::where('theatre_id',$show->theatre_id)->get();
        $theatre = Theatre::where('id',$show->theatre_id)->first();
        $movies = Movie::where('is_active','Active')->get();
        return view('shows.form')
        ->with('show',$show)
        ->with('theatre',$theatre)
        ->with('showtimes',$showtimes)
        ->with('movies',$movies);
    }

    public function update($id, Request $request) {
        $show = Show::find($id);
        $show->theatre_id = $request->input('theatre_id');
        $show->showtime_id = $request->input('showtime_id');
        $show->movie_id = $request->input('movie_id');
        $show->start_date = $request->input('start_date');

        $theatre_name = Theatre::where('id',$request->theatre_id)->select('name')->first();
         $show['theatre_name'] = $theatre_name['name'];
         $showtime_name = Showtime::where('id',$request->showtime_id)->select('name')->first();
         $show['showtime_name'] = $showtime_name['name'];
         $movie_name = Movie::where('id',$request->movie_id)->select('movie_name')->first();
         $show['movie_name'] = $movie_name['movie_name'];         
        $show->save();
        return redirect()->route('show-home');
    }
    public function delete($id) {
        $show = Show::find($id);
        $show->delete();
        return redirect()->back();
    }
}
