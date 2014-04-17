<?php

class PostController extends BaseController {
	public function getList()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();

		if (!$posts->count())
		{
			$posts = false;
		}

		return View::make('post.list')->with('posts', $posts)->with('head_title', 'Index');
	}

	public function getShow($slug)
	{
		$post = Post::whereSlug($slug)->first();

		return View::make('post.show')->with('post', $post)->with('head_title', $post->title);
	}

	public function getManage()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();

		return View::make('post.manage')->with('posts', $posts)->with('head_title', 'Manage posts');
	}

	public function getCreate()
	{
		return View::make('post.create')->with('head_title', 'Create new post');
	}

	public function postCreate()
	{
		$post = new Post;
		$post->title = Input::get('title');
		$post->slug = Input::get('slug');
		$post->content = Input::get('content');
		$post->user_id = 1; // @todo: only temporary!
		$post->save();

		return Redirect::to('admin/post/edit/'.$post->id);
	}

	public function getEdit($id)
	{
		$post = Post::find($id);

		return View::make('post.edit')->with('post', $post)->with('head_title', 'Edit post');
	}

	public function postEdit()
	{
		$id = Input::get('id');

		$post = Post::find($id);
		$post->title = Input::get('title');
		$post->slug = Input::get('slug');
		$post->content = Input::get('content');
		$post->save();

		return Redirect::to("admin/post/edit/$id");
	}

	public function getDelete($id)
	{
		Post::destroy($id);

		return Redirect::action('PostController@getManage');
	}
}
