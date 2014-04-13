<?php

class PostController extends BaseController {
	public function getList()
	{
		$posts = Post::all();

		if (!$posts->count())
		{
			$posts = false;
		}

		return View::make('post.list')->with('posts', $posts);
	}

	public function getShow($slug)
	{
		$post = Post::whereSlug($slug)->first();

		return View::make('post.show')->with('post', $post);
	}
}
