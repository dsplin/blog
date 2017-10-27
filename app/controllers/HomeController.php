<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.master';

	// Головна сторінка
	public function index()
	{
		$id_id=Blog::first()->id;

		$coments=Blog::find($id_id)->coments;
		$i=0;
		foreach ($coments as $coment)
		{
			$coment->post_id;
			$i++;
		}
		$id_coment=$id_id;		

		$count_coments=$i;

		$comentsUser=User::find(2)->comentsUser;
		$j=0;
		foreach ($comentsUser as $coment)
		{
			$coment->user_id;
			$j++;
		}
		
		$count_coments_user=$j;
		
		
		$this->layout->content = View::make('blog.index', compact('count_coments','id_coment','count_coments_user'));

	}
	
	////////////////////////////
	public function testindex()
	{
		$count_coments_user=-1;
		$this->layout->content = View::make('blog.testindex', compact('count_coments_user'));

	}
	public function show($id)
	{

		$artical=Blog::find($id);
		$avtor=$artical->login;
		$coments=Blog::find($id)->coments;
		$i=0;
		foreach ($coments as $coment)
		{
			$coment->post_id;
			$i++;
		}

		$count_coments=$i;


		$id_coment=$id;
		$count_coments_user=-1;
		$this->layout->content = View::make('blog.testshow', compact('id','count_coments_user','id_coment','count_coments','artical','avtor'));

	}
	////////////////////////////

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
		return Redirect::route('testindex');
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
		Session::put('key2', Input::get('route'));
		$value = Session::get('key2');
		$c = new Coment;
		$c-> coment=Input::get('coment');
		$c-> user_id=User::first()->id;
		$c-> post_id=$value;
		$c-> save();
		return Redirect::route('home');
	}
////////////////////////тестові розробк////////////////////////////
	public function php()
	{		
		return View::make('blog.php');
	}
	public function testform()
	{
		Session::put('key', Input::get('route'));
		$id = Session::get('key');
		$this->layout->content = View::make('blog.testform', compact('id'));
	}

	public function testadd()
	{
		Session::put('key2', Input::get('route'));
		$value = Session::get('key2');
		$c = new Coment;
		$c-> coment=Input::get('coment');
		$c-> user_id=User::first()->id;
		$c-> post_id=$value;
		$c-> save();
		return Redirect::route('testindex');
	}
	
}
