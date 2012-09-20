<?php

class Admin_States_Controller extends Base_Controller {
	
	public $restful = true; 

	public function get_add() 
	{
		$view = View::make('admin.states.add_state');
		$view['title']  = 'Linq Property: Admin Add State';	
		$view['current_page']  = 'add-state';		
		return $view;
	}

	public function post_add() 
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

	public function get_index()
	{
		$view = View::make('admin.states.index');
		$view['title']  = 'Linq Property: Admin Manage States';	
		$view['current_page']  = 'manage-states';
		$view['states'] = DB::table('states')->paginate(2);
		return $view;

		
	}

}