@extends('layout')

@section('content')
	<article>
		<h2>Login</h2>

		{{ Form::open(array('action' => 'UserController@postLogin')) }}

		{{ Form::label('username', 'Username') }}
		{{ Form::text('username', Input::old('username')) }}

		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}

		{{ Form::submit('Login') }}

		{{ Form::close() }}

		@if($errors->has())
			<ul>
			@foreach ($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
			</ul>
		@endif

		@if(Session::has('message'))
			<p>{{Session::get('message')}}</p>
		@endif
	</article>
@stop