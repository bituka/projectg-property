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
		// get POST data
	    $name = Input::get('name');

	    $state = new State;
		$state->name = $name;

		if ($state->save()) {
			return Redirect::back()->with('success', 'State successfuly added!');
		} else {
			return Redirect::back()->with_errors( $state->errors->all() );
		}

		



	}





}