@extends('admin.layout')

@section('content')
	<div class="well">
		<h1>Posts</h1>
		<a href="{{ URL::to('admin/post/new') }}" class="button button-primary button-create">Create new</a>
	</div>

	<div class="table-container">
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Created at</th>
					<th>Updated at</th>
					<th>Author</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

	@if(!$posts->count())
		<p>No entries</p>
	@else
		@foreach($posts as $post)
			<tr>
				<td>{{ $post->title }}</td>
				<td>{{ date('d-m-Y', $post->created_at->timestamp) }}</td>
				<td>{{ date('d-m-Y', $post->updated_at->timestamp) }}</td>
				<td>{{ $post->user->username }}</td>
				<td>
					<a class="button button-plain" href="{{ URL::to('admin/post/edit/'.$post->id) }}">Edit</a>
					<a class="button button-plain" href="{{ URL::to('admin/post/delete/'.$post->id) }}">Delete</a>
				</td>
			</tr>
		@endforeach
	@endif

			</tbody>
		</table>
	</div>
@stop