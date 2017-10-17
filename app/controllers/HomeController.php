<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	// Головна сторінка
	public function index()
	{
		$this->layout->content = View::make('blog.index');
		//return View::make('helloworld');
	}

	// Авторизація
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


	// Добавлення статті
	public function add_post()
	{
		$this->layout->content = View::make('blog.add_post');
		//return View::make('helloworld');
	}
	
	public function add_post_db()
	{
		$b = new Blog;
		$b-> title= Input::get('title');
		$b->content=Input::get('content');
		$b-> user_id=User::first()->id;
		$b->login=User::first()->login;
		$b-> save();
		return Redirect::route('home');
	}

	// Добавлення коментів
	public function add_coments_db()
	{
		//Input::get('route')
		Session::put('key', Input::get('route'));
		return Redirect::route('home');
	}

	public function add_coments_2()
	{
		

		return 'home';
	}
	
}
