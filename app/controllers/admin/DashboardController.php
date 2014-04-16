<?php
namespace Admin;
use BaseController;
use View;

class DashboardController extends BaseController {
	public function getIndex()
	{
		return View::make('admin.dashboard');
	}
}
