<?php

Route::get('/page1', 'PagesController@showPage1');
Route::get('/page2', 'PagesController@showPage2');

Route::get('/page3', 'PagesController@customPage');
Route::get('/randomgenerator', 'PagesController@getRandomNumber');