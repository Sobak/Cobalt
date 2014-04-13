@extends('layout')

@section('content')
	@if($status)
		<p>You're logged in as {{ $username }} ({{ $level }})</p>
		<p>You can log out <a href="user/logout">here</a></p>
	@else
		You're not logged in
	@endif
@stop