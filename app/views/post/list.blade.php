@extends('layout')

@section('content')
	@if(!$posts->count())
		<article>
			<h2>No posts found</h2>
			<p>No entries on this page yet, sorry.</p>
		</article>
	@else
		@foreach($posts as $post)
			<article>
				<h2><a href="post/{{ $post->slug }}/">{{{ $post->title }}}</a></h2>
				{{ $post->content }}
			</article>
		@endforeach
	@endif
@stop