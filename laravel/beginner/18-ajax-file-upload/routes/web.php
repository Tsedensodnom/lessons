<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
	$albums = \DB::table('albums')->orderby('created_at')->get();
	foreach ($albums as $key => $value) {
		$id = array_first(json_decode($value->photo_ids));
		$file = \DB::table('files')->where('id', $id)->first();
		$albums[$key]->cover = $file->filename;
	}
    return view('list', [
    	'albums' => $albums,
	]);
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/album/create', function (\Illuminate\Http\Request $request) {
	\DB::table('albums')->insert([
		'name' => $request->input('name'),
		'photo_ids' => $request->input('photo_ids'),
	]);

	return redirect()->to('/');
});

Route::get('/album/{id}', function (\Illuminate\Http\Request $request, $id) {
	$album = \DB::table('albums')->where('id', $id)->first();
	$photos = \DB::table('files')->whereIn('id', json_decode($album->photo_ids))->orderby('created_at', 'desc')->get();
	return view('photos', [
		'album' => $album,
		'photos' => $photos,
	]);
});

Route::post('/upload', function (Request $request) {
	$path = $request->file('photos')->store('photos', 'public_path');
	$id = \DB::table('files')->insertGetId(['filename' => $path]);
	return [
		'files' => [
			[
				'id' => $id,
				'name' => basename($path),
			],
		],
	];
});