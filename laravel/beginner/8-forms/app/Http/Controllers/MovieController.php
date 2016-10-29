<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MovieController extends Controller
{
    public function index () {
        $movies = \App\Movie::orderby('created_at', 'asc')->get();
    
        return view('index', [
            'movies' => $movies,
        ]);
    }
    
    public function store (Request $request) {
        $movie = new \App\Movie;
        $movie->name = $request->get('name');
        $movie->year = $request->get('year');
        $movie->save();
        
        return redirect()->to('/');
    }
}
