<?php

class HomeController extends BaseController {
	public function getIndex()
	{
		$data['status'] = Auth::check();

		if ($data['status'])
		{
			$data['level'] = Auth::user()->level;
			$data['username'] = Auth::user()->username;
		}

		return View::make('hello', $data);
	}
}
