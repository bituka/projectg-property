<?php

class Site_Controller extends Base_Controller {
	
	public $restful = true; 

	/**
	 * render home page
	 */
	 public function get_index() 
	 {
		$view = View::make('site.index');
		$view['current_page']  = 'home';		
		return $view;
	 }

}