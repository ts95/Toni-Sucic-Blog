<?php

class AuthController extends BaseController {

	public function login() {
		if (Request::isMethod('get')) {
			return View::make('auth.login');
		}

		$input = Input::all();

		$attempt = Auth::attempt([
			'email'		=> $input['email'],
			'password'	=> $input['password'],
		], true);

		if ($attempt) {
			return Redirect::intended('/')->with('message', "You have been logged in.");
		}

		return Redirect::back()->with('message', "Invalid credentials.")->withInput();
	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/')->with('message', "You have been logged out.");
	}

	public function register() {
		if (Auth::id() !== 1) {
			return View::make('generic')->with([
				'title' => "Can't register",
				'text'	=> "New accounts can only be created by Toni Sučić.",
			]);
		}

		if (Request::isMethod('get')) {
			return View::make('auth.register');
		}

		$input = Input::all();

		if (strcmp($input['password'], $input['repeat-password']) !== 0) {
			return Redirect::back()->with('message', "Password mismatch.");
		}

		$validator = Validator::make($input, [
			'name'		=> 'required|min:2|max:60',
			'email'		=> 'required|max:60|email|unique:users',
			'password'	=> 'required|min:5',
		]);

		if ($validator->passes()) {
			$name = $input['name'];
			$email = $input['email'];
			$password = Hash::make($input['password']);

			$user = User::create([
				'name'		=> $name,
				'email'		=> $email,
				'password'	=> $password,
			]);

			Auth::loginUsingId($user->id);

			return Redirect::action('BlogController@index')->with('message', "You have been registered and logged in.");
		}

		$errors = implode('<br>', $validator->messages()->all());

		return Redirect::back()->with('message', $errors);
	}
}

