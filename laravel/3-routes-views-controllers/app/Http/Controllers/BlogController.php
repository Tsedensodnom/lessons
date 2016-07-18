<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function index() {
        return $this->postList();
    }
    
    public function postList() {
        $posts = \App\Post::orderby('created_at', 'desc')
            ->paginate(5);
        
        return view('home', [
            'posts' => $posts,
        ]);
    }
    
    public function postDetail($id) {
        $post = \App\Post::findOrFail($id);
        return view('post', [
            'post' => $post,
        ]);
    }
    
    public function categoryDetail($id) {
        $posts = \App\Post::orderby('posts.created_at', 'desc')
            ->join('posts_categories', function ($join) use ($id) {
                $join->on('posts.id', '=', 'posts_categories.post_id')
                    ->where('posts_categories.category_id', '=', $id);
            })
            ->paginate(5);
            
        return view('home', [
            'posts' => $posts
        ]);
    }
}
