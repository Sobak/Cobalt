<?php
namespace Admin;

class SettingsController extends \BaseController {
	public function getIndex()
	{
		$view = [
			'head_title' => 'Edit configuration',
			'settings' => \Setting::all()
		];

		return \View::make('admin.settings', $view);
	}

	public function postIndex()
	{
		foreach (\Input::all() as $name => $value)
		{
			\DB::table('settings')->where('name', $name)->update(['value' => $value]);
		}

		return \Redirect::back()->with('message', 'Settings have been saved');
	}
}
