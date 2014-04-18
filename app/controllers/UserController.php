<?php

class UserController extends BaseController {
	public function getLogin()
	{
		return View::make('user.login')->with('head_title', 'Login');
	}

	public function postLogin()
	{
		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
		];
		$rules = [
			'username' => 'required',
			'password' => 'required'
		];

		$validator = Validator::make($credentials, $rules);
		if ($validator->passes())
		{
			if (Auth::attempt($credentials))
			{
				return Redirect::to('/');
			}

			return Redirect::back()->withInput()->with('message', 'Username or password is invalid.');
		}
		else
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
	}

	public function getRegister()
	{
		return View::make('user.register')->with('head_title', 'Register');
	}

	public function postRegister()
	{
		$rules = [
			'username' => 'required|alpha_num|between:3,32|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6|confirmed'
		];

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes())
		{
			$user = new User();
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::back()->with('message', 'Your account has been registered.');
		}
		else
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}
