<?php

class Setting extends Eloquent{
	public $timestamps = false;

	public static function get($name)
	{
		return Setting::whereName($name)->first()->value;
	}
}
