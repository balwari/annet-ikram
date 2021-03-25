<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theatre;
use Auth;

class TheatreController extends Controller
{
    public function index() {
        $theatres = Theatre::paginate(10);
        return view('theatres.home')->with('theatres',$theatres);
    }

    public function create(Request $request) {
        $theatre = $request->validate([
            'name' => 'required|string|max:100',
            'city' => 'required|string|max:100',
        ]);
        $create = Theatre::create($theatre);
        return redirect()->back();
    }
    
    public function getTheatre($id) {
        $theatre = Theatre::find($id);
        return view('theatres.form')->with('theatre',$theatre);
    }

    public function update($id, Request $req) {
        $theatre = Theatre::find($id);
        $theatre->name = $req->input('name');
        $theatre->city = $req->input('city');
        $theatre->save();
        return redirect()->route('theatre-home');
    }
    public function delete($id) {
        $theatre = Theatre::find($id);
        $theatre->delete();
        return redirect()->back();
    }
}