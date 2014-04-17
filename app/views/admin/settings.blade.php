@extends('admin.layout')

@section('content')
	<div class="well">
		<h1>Edit configuration</h1>
	</div>
	{{ Form::open(array('action' => 'Admin\SettingsController@postIndex')) }}
	<div class="table-container table-form">
		<table class="table">
		@foreach($settings as $setting)
			<tr>
				<td>
					{{ Form::label($setting->name, $setting->description) }}
				</td>
				<td>
					@if($setting->type == 'boolean')
						{{ Form::select($setting->name, ['1' => 'Yes', '0' => 'No'], $setting->value) }}
					@elseif($setting->type == 'text')
						{{ Form::textarea($setting->name, $setting->value) }}
					@else
						{{ Form::text($setting->name, $setting->value) }}
					@endif
				</td>
			</tr>
		@endforeach
		</table>
	</div>
	<div class="actions">
		<div class="button-well">
			{{ Form::submit('Save', ['class' => 'button button-primary']) }}
		</div>
	</div>
	{{ Form::close() }}
@stop

@section('notifications')
	@if(Session::has('message'))
		{{ Helper::adminNotification(Session::get('message')) }}
	@endif
@stop