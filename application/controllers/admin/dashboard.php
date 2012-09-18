<?php

class Admin_Dashboard_Controller extends Base_Controller {
	
	public $restful = true; 

	/**
	 * render the home page of the admin panel
	 */
	 public function get_index() 
	 {
		$view = View::make('admin.dashboard');
		$view['title']  = 'Linq Property: Admin Dashboard';	
		$view['current_page']  = 'Admin Dashboard';		
		return $view;
	 

	 }





}