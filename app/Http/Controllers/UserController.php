<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theatre;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\Show;
use App\Models\Booking;
use Auth;

class UserController extends Controller
{
    public function index() {
        return view('userhome');
    }

    public function get() {
        $shows = Show::paginate(9);
        return view('udashboard')->with('shows',$shows);
    }

    public function getShow($id) {
        $show = Show::find($id);
        return view('book')->with('show',$show);
    }

    public function book($id, Request $request) {
        $show = Show::find($id);
        $booking['showtime_id'] = $show['showtime_id'];
        $booking['theatre_id'] = $show['theatre_id'];
        $booking['movie_id'] = $show['movie_id'];
        $booking['showtime_name'] = $show['showtime_name'];
        $booking['theatre_name'] = $show['theatre_name'];
        $booking['movie_name'] = $show['movie_name'];
        $booking['no_tickets'] = $request->input('no_tickets');
        $booking['name'] = $request->input('name');
        $booking['mobile'] = $request->input('mobile');
        $booking['amount'] = $request->input('no_tickets')*100;
        $create = Booking::create($booking);
        $message = "Ticket Booked Successfully";

        return view('success')->with('message',$message);
    }
}
