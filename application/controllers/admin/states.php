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
		$view['states'] = DB::table('states')->paginate(10);
		return $view;
	}

	public function get_edit($id)
	{
		$view = View::make('admin.states.edit');
		$view['title']  = 'Linq Property: Admin Edit State';	
		$view['current_page']  = 'edit-state';
		$view['state'] = State::find($id);
		return $view;
	}

	public function post_edit()
	{
		$state = State::find(Input::get('id'));

		$state->name = Input::get('name');

		if ($state->save()) {
			return Redirect::back()->with('success', 'State successfully updated!');
		}

		return Redirect::back()->with_errors( $state->errors->all() );
		
	}

	public function get_delete($id)
	{
		$state = State::find($id);

		if (is_null($state)) {
			return Response::error('404');
		}

		$state->delete();

		return Redirect::back()->with('success', 'State successfully deleted!');
	}



}