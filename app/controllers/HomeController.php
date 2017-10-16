<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	public function index()
	{
		$this->layout->content = View::make('blog.index');
		//return View::make('helloworld');
	}

	public function login()
	{
		$this->layout->content = View::make('blog.login');
		//return View::make('helloworld');
	}

	public function reg()
	{
		$result=Auth::attempt([
			'login' => Input::get('login'),
			'password' => Input::get('password')],true);

		if (! $result)
			return Redirect::route('login')->with('error','Невірний логін чи пароль. Повторіть спробу ще раз.'); //get чи post? with?
		else
			return Redirect::route('home');
		//$this->layout->content = View::make('blog.index');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

}
