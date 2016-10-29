<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public static function latest($limit = 5) {
		$posts = \DB::table('posts')->where('collection', 'latest')->orderby('created_at', 'desc')->limit(5)->get();
		foreach ($posts as $key => $value) {
			$uri = new \Enrise\Uri($value->url);
			$posts[$key]->host = $uri->getHost();
			if ($value->title == null || $value->title == '') {
				$posts[$key]->title = '- хоосон -';
			}
		}
		return $posts;
	}

	public static function featured($limit = 5) {
		$posts = \DB::table('posts')->where('collection', 'featured')->orderby('created_at', 'desc')->limit(5)->get();
		foreach ($posts as $key => $value) {
			$uri = new \Enrise\Uri($value->url);
			$posts[$key]->host = $uri->getHost();
			if ($value->title == null || $value->title == '') {
				$posts[$key]->title = '- хоосон -';
			}
		}
		return $posts;
	}

	public static function searched($text, $limit = 5) {
		$text = mb_strtolower($text);
		$q = explode(' ', $text);

		$query = \DB::table('posts');
		foreach ($q as $key => $value) {
			$query = $query->orWhere('title', 'LIKE', '%'.$value.'%');
		}
		$query = $query->orWhere('url', 'LIKE', '%'.$value.'%');

		$posts = $query->orderby('created_at', 'desc')->groupby('url')->limit(5)->get();
		foreach ($posts as $key => $value) {
			$uri = new \Enrise\Uri($value->url);
			$posts[$key]->host = $uri->getHost();
			if ($value->title == null || $value->title == '') {
				$posts[$key]->title = '- хоосон -';
			}
		}
		return $posts;
	}
}
