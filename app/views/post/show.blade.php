@extends('layout')

@section('content')
	<article>
		<h2>{{{ $post->title }}}</h2>
		{{ $post->content }}

		<p>Written by: {{ $post->user->username }}</p>
	</article>
@stop