<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // $faker = \Faker\Factory::create();
    // $slugify = new \Cocur\Slugify\Slugify();

    // $data = [];
    // for ($i = 0; $i < 10; $i++) {
    //     $post = new \App\Post;
    //     $post->title = $faker->sentence(3);
    //     $post->slug = $slugify->slugify($post->title);
    //     $post->excerpt = $faker->sentences(3, true);
    //     $post->content = $faker->sentences(30, true);
    //     $post->save();
    // }
    
    $posts = \App\Post::orderby('created_at', 'desc')->get();
    return view('welcome', [
        'posts' => $posts,
    ]);
});
