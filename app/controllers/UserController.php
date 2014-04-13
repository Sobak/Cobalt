<?php

class UserController extends BaseController {
	public function getLogin()
	{
		if (Auth::check())
		{
			Redirect::to('/');
		}

		return View::make('user.login');
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
		if (Auth::check())
		{
			Redirect::to('/');
		}

		return View::make('user.register');
	}

	public function postRegister()
	{
		$credentials = [
			'username' => Input::get('username'),
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation')
		];
		$rules = [
			'username' => 'required|alpha_num|between:3,32',
			'email' => 'required|email',
			'password' => 'required|min:6|confirmed'
		];

		$validator = Validator::make($credentials, $rules);
		if ($validator->passes())
		{
			$user = new User();
			$user->username = $credentials['username'];
			$user->email = $credentials['email'];
			$user->password = Hash::make($credentials['password']);
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
