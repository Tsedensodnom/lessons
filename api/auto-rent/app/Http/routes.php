<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

$app->group(['prefix' => 'lessons/api/auto-rent/public'], function () use ($app) {
	$app->get('/vehicle', function () use ($app) {
		return [
			'data' => \DB::table('vehicles')->orderby('created_at', 'desc')->get(),
		];
	});

	$app->post('/vehicle', function (Request $request) use ($app) {
		$data = [
			'uid' => $request->input('uid'),
			'manufacturer' => $request->input('manufacturer'),
			'model' => $request->input('model'),
			'year' => $request->input('year'),
		];
		$id = \DB::table('vehicles')->insertGetId($data);
		$model = \DB::table('vehicles')->where('id', $id)->first();
		return ['data' => $model];
	});

	$app->put('/vehicle/{id}', function (Request $request, $id) use ($app) {
		$data = [
			'uid' => $request->input('uid'),
			'manufacturer' => $request->input('manufacturer'),
			'model' => $request->input('model'),
			'year' => $request->input('year'),
		];
		\DB::table('vehicles')->where('id', $id)->update($data);
		$model = \DB::table('vehicles')->where('id', $id)->first();
		return ['data' => $model];
	});

	$app->delete('/vehicle/{id}', function (Request $request, $id) use ($app) {
		\DB::table('vehicles')->where('id', $id)->delete();
		return ['data' => $id];
	});
});