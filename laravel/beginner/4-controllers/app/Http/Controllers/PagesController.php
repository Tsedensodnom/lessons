<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function showPage1 () {
        return view('view1');
    }
    
    public function showPage2 () {
        return view('view2');
    }
    
    public function customPage () {
        return 'Hello, This is Custom Page Function';
    }
    
    public function getRandomNumber () {
        return rand(1, 100);
    }
}
