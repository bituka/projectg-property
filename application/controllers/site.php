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
	 
}
