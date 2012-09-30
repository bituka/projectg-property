<?php

class Site_Controller extends Base_Controller {
	
	public $restful = true; 

	/**
	 * render home page
	 */
	 public function get_index() 
	 {
		$view = View::make('site.index');
		$view['title']  = 'Linq Property: Home';	
		$view['current_page']  = 'home';		
		return $view;
	 }
	
	public function get_find_prop() 
	 {
		$view = View::make('site.find_prop');
		$view['title']  = 'Linq Property: Find a Property';
		$view['current_page']  = 'find a property';		
		return $view;
	 }

	 
	public function get_about() 
	 {
		$view = View::make('site.about');
		$view['title']  = 'Linq Property: About';
		$view['current_page']  = 'about us';		
		return $view;
	 } 

	public function get_contact() 
	 {
		$view = View::make('site.contact');
		$view['title']  = 'Linq Property: Contact';
		$view['current_page']  = 'contact us';		
		return $view;
	 } 
	 
	 public function get_news() 
	 {
		$view = View::make('site.news');
		$view['title']  = 'Linq Property: News';
		$view['current_page']  = 'property news';		
		return $view;
	 } 
	 
	/**
	* render login page
	*/
	public function get_login() 
	{

		if (Auth::check())
		{
		    return Redirect::to_route('dashboard');		 
		}
		else
		{
			$view = View::make('site.login');
			$view['title']  = 'Linq Property: Login';	
			$view['current_page']  = 'login';		
			return $view;
		}

	
	}

	/**
	* process login
	*/
	public function post_login() 
	{
		// to hash a password
		// echo $pass = Hash::make('admin');

		// get POST data
	    $username = Input::get('username');
	    $password = Input::get('password');

		$credentials = array(
			'username' => $username, 
			'password' => $password,
		);

		if (Auth::attempt($credentials))
		{
			return Redirect::to_route('dashboard');		 
		}
		else
		{
			return Redirect::to_route('login')
            	->with('login_errors', true);
		}


	}

	/**
	* logout
	*/
	public function get_logout() 
	{
	 	Auth::logout();
	 	return Redirect::to_route('login');
	}
	 
}
