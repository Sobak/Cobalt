<?php

class PostController extends BaseController {
	public function getList()
	{
		$posts = Post::orderBy('created_at', 'desc')->get();

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
		$rules = [
			'title' => 'required|max:100',
			'slug' => 'required|alpha_dash|max:100|unique:posts',
			'content' => 'required'
		];

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes())
		{
			$post = new Post;
			$post->title = Input::get('title');
			$post->slug = Input::get('slug');
			$post->content = Input::get('content');
			$post->user_id = Auth::user()->id;
			$post->save();

			return Redirect::to('admin/post/edit/'.$post->id)->with('message', 'Post has been successfully created.');
		}
		else
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
	}

	public function getEdit($id)
	{
		$post = Post::find($id);

		return View::make('post.edit')->with('post', $post)->with('head_title', 'Edit post');
	}

	public function postEdit()
	{
		$rules = [
			'title' => 'required|max:100',
			'slug' => 'required|alpha_dash|max:100', // @todo: bug here, have to check uniqueness properly
			'content' => 'required'
		];

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes())
		{
			$id = Input::get('id');

			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->slug = Input::get('slug');
			$post->content = Input::get('content');
			$post->save();

			return Redirect::back()->with('message', 'Post has been updated.');
		}
		else
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
	}

	public function getDelete($id)
	{
		Post::destroy($id);

		return Redirect::action('PostController@getManage');
	}
}
