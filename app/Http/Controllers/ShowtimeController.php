<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theatre;
use App\Models\Movie;
use App\Models\Showtime;
use Auth;

class ShowtimeController extends Controller
{
    public function index() {
        $showtimes = Showtime::paginate(10);
        $theatres = Theatre::select('id','name')->get();
        return view('showtimes.home')->with('showtimes',$showtimes)->with('theatres',$theatres);
    }

    public function create(Request $request) {
        $showtime = $request->validate([
            'theatre_id' => 'required|integer|exists:theatres,id',
            'name' => 'required|string|max:100',
            'start_time' => 'required',
        ]);
         $theatre_name = Theatre::where('id',$request->theatre_id)->select('name')->first();
         $showtime['theatre_name'] = $theatre_name['name'];
         $create = Showtime::create($showtime);
        return redirect()->back();
    }
    
    public function getShowtime($id) {
        $showtime = Showtime::find($id);
        $theatres = Theatre::select('id','name')->get();
        return view('showtimes.form')->with('showtime',$showtime)->with('theatres',$theatres);
    }

    public function update($id, Request $req) {
        $showtime = Showtime::find($id);
        $showtime->theatre_id = $req->input('theatre_id');
        $showtime->name = $req->input('name');
        $showtime->start_time = $req->input('start_time');
        $theatre_name = Theatre::where('id',$req->theatre_id)->select('name')->first();
        $showtime['theatre_name'] = $theatre_name['name'];
         
        $showtime->save();
        return redirect()->route('showtime-home');
    }
    public function delete($id) {
        $showtime = Showtime::find($id);
        $showtime->delete();
        return redirect()->back();
    }
}
