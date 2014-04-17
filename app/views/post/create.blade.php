@extends('admin.layout')

@section('content')
	<div class="well">
		<h1>Create new post</h1>
	</div>
	{{ Form::open(array('action' => 'PostController@postCreate')) }}
	<div class="table-container table-form">
		<table class="table">
			<tr>
				<td>
					{{ Form::label('title', 'Title') }}
				</td>
				<td>
					{{ Form::text('title', Input::old('title'), ['class' => 'large']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('slug', 'Slug') }}
				</td>
				<td>
					{{ Form::text('slug', Input::old('slug')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('content', 'Content') }}
				</td>
				<td>
					{{ Form::textarea('content', Input::old('content')) }}
				</td>
			</tr>
		</table>
	</div>
	<div class="actions">
		<div class="button-well">
			{{ Form::submit('Save', ['class' => 'button button-primary']) }}
		</div>
		<a class="button button-link" data-icon="[" href="{{ URL::to('admin/posts') }}">Manage posts</a>
	</div>
	{{ Form::close() }}
@stop

@section('notifications')
	@if($errors->has())
		@foreach ($errors->all() as $message)
			{{ Helper::adminNotification($message, 'error') }}
		@endforeach
	@endif

	@if(Session::has('message'))
		{{ Helper::adminNotification(Session::get('message')) }}
	@endif
@stop