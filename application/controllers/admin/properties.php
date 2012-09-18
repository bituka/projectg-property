<?php

class Admin_Properties_Controller extends Base_Controller {
	
	public $restful = true; 

	public function get_add_state() 
	{
		$view = View::make('admin.states.add_state_form');
		$view['title']  = 'Linq Property: Admin Add State';	
		$view['current_page']  = 'add-state';		
		return $view;
	}

	public function post_add_state() 
	{
		echo 'adding state';
		// $view = View::make('admin.dashboard');
		// $view['title']  = 'Linq Property: Admin Dashboard';	
		// $view['current_page']  = 'Admin Dashboard';		
		// return $view;
	}





}