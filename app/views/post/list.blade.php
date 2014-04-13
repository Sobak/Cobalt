@extends('layout')

@section('content')
	@if(!$posts)
		<p>No entries</p>
	@else
		@foreach($posts as $post)
			<article>
				<h2><a href="post/{{ $post->slug }}/">{{{ $post->title }}}</a></h2>
				{{ $post->content }}
			</article>
		@endforeach
	@endif
@stop