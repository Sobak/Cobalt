<?php
namespace Admin;

class DashboardController extends \BaseController {
	public function getIndex()
	{
		$view = [
			'head_title' => 'Dashboard',
			'menu_section' => 'dashboard'
		];

		return \View::make('admin.dashboard', $view);
	}
}
