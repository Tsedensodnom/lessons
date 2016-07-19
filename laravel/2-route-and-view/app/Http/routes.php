<?php

//http://localhost/mysite/
Route::get('/', function () {
    return view('home'); //resources/views/home.blade.php
});

//http://localhost/mysite/about
Route::get('/about', function () {
    return view('about'); //resources/views/about.blade.php
});

//http://localhost/mysite/contact
Route::get('/contact', function() {
    return view('contact'); //resources/views/contact.blade.php
});