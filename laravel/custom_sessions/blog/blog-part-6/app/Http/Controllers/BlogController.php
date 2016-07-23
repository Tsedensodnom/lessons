<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function home () {
        $posts = \App\Post::orderby('created_at', 'desc')
            ->paginate(5);
        
        return view('welcome', [
            'posts' => $posts,
        ]);
    }
    
    public function posts () {
        return $this->home();
    }
    
    public function showCategory ($id) {
        $posts = \App\Post::where('category_id', $id)
            ->orderby('created_at', 'desc')
            ->paginate(5);
        
        return view('welcome', [
            'posts' => $posts,
        ]);
    }
    
    public function showPost ($id) {
        $post = \App\Post::find($id);
        
        return view('post', [
            'post' => $post,
        ]);
    }
}
