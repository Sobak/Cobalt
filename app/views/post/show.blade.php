@extends('layout')

@section('content')
	<article>
		<h2><a href="post/{{ $post->slug }}/">{{{ $post->title }}}</a></h2>
		{{ $post->content }}

		<p>Written by: {{ $post->user->username }}</p>
	</article>
@stop