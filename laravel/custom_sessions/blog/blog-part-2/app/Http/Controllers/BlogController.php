<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function home () {
        return view('welcome');
    }
    
    public function posts () {
        
    }
    
    public function showCategory ($id) {
        
    }
    
    public function showPost ($id) {
        
    }
}
