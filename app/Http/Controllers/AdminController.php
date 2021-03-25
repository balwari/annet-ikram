<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theatre;
use App\Models\Booking;
use Auth;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function create(Request $request) {
        $theatre = $request->validate([
            'name' => 'required|string|max:100',
            'city' => 'required|string|max:100',
        ]);
        $create = Theatre::create($theatre);
        return redirect()->back();
    }

    public function update($id, Request $req) {
        $theatre = Theatre::find($id);
        $theatre->name = $req->input('name');
        $theatre->city = $req->input('city');
        $theatre->save();
        return redirect()->route('all');
    }
    public function delete($id) {
        $theatre = Theatre::find($id);
        $theatre->delete();
        return redirect()->back();
    }

    public function getBookings() {
        $bookings = Booking::paginate(10);
        return view('admin.bookings')->with('bookings',$bookings);
    }
    
}