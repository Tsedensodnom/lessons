<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    public function index () {
        $movies = \App\Movie::orderby('created_at', 'asc')->get();
    
        return view('index', [
            'movies' => $movies,
        ]);
    }
    
    public function store (MovieRequest $request) {
        // $this->validate($request, [
        //     'name' => 'required|min:4',
        //     'year' => 'required|numeric|min:1950|max:2020',
        // ]);
        
        $movie = new \App\Movie;
        $movie->name = $request->get('name');
        $movie->year = $request->get('year');
        $movie->save();
        
        return redirect()->to('/');
    }
}
