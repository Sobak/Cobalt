@extends('layout')

@section('content')
	<article>
		<h2>Register new account</h2>

		{{ Form::open(array('action' => 'UserController@postRegister')) }}

		{{ Form::label('username', 'Username') }}
		{{ Form::text('username', Input::old('username')) }}

		{{ Form::label('email', 'Email address') }}
		{{ Form::email('email', Input::old('email')) }}

		{{ Form::label('password', 'Password') }}
		{{ Form::password('password') }}

		{{ Form::label('password_confirmation', 'Confirm password') }}
		{{ Form::password('password_confirmation') }}

		{{ Form::submit('Register') }}

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