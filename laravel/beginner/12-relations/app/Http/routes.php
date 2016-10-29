<?php

Route::get('/', function () {
    $categories = \App\Category::get();
    
    return view('index', [
        'categories' => $categories,
    ]);
});

Route::get('/savedemodata', function () {
   $categories = \App\Category::get();
   foreach ($categories as $c) {
       $product = new \App\Product;
       $product->name = 'Product '. rand(0, 100);
       $c->products()->save($product);
   }
});

Route::get('/deletedata', function () {
    $categories = \App\Category::get();
    foreach ($categories as $c) {
        $c->products()->delete();
    }
});


Route::get('/products', function () {
    $products = \App\Product::get();
    return view('belongsto', [
        'products' => $products,
    ]); 
});


Route::get('/many-to-many', function () {
    $categories = \App\Category::get();
    $products = \App\Product::get();
    
    return view('many', [
        'categories' => $categories,
        'products' => $products,
    ]);
});

Route::get('/savemany', function () {
    $categories = \App\Category::get();
    foreach ($categories as $c) {
        $product = \App\Product::where('id', \DB::raw('NOW()'))->first();
        $c->products()->attach($product);
    }
});