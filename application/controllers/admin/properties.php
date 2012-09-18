<?php

class Admin_Properties_Controller extends Base_Controller {
	
	public $restful = true; 

	public function get_add_state() 
	{
		$view = View::make('admin.states.add_state');
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

	public function get_add_category() 
	{
		$view = View::make('admin.categories.add_category');
		$view['title']  = 'Linq Property: Admin Add Category';	
		$view['current_page']  = 'add-category';		
		return $view;
	}

	public function post_add_category() 
	{
		// get POST data
	    $name = Input::get('name');

	    $category = new Category;
		$category->name = $name;

		if ($category->save()) {
			return Redirect::back()->with('success', 'Category successfuly added!');
		} else {
			return Redirect::back()->with_errors( $category->errors->all() );
		}

	}

	public function get_add_property() 
	{
		$view = View::make('admin.properties.add_property');
		$view['title']  = 'Linq Property: Admin Add Property';	
		$view['current_page']  = 'add-property';		
		return $view;
	}

	public function post_add_property() 
	{
		// get POST data
	    $name = Input::get('name');

	    $property = new Property;
		$property->name = $name;

		if ($property->save()) {
			return Redirect::back()->with('success', 'Property successfuly added!');
		} else {
			return Redirect::back()->with_errors( $property->errors->all() );
		}

	}



}