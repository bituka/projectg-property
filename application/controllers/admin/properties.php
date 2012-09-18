<?php

class Admin_Properties_Controller extends Base_Controller {
	
	public $restful = true; 

	public function get_add() 
	{
		$view = View::make('admin.properties.add_property');
		$view['title']  = 'Linq Property: Admin Add Property';	
		$view['current_page']  = 'add-property';		
		$view['categories'] = Category::all();

		// states
		$states_array = array();

		foreach (State::all() as $state) {
			$states_array[ $state->name ] = $state->name;
		}

		$view['states_array'] = $states_array;

		// categories
		$categories_array = array();

		foreach (Category::all() as $category) {
			 $categories_array[ $category->name ] = $category->name;
		}

		$view['categories_array'] = $categories_array;

		return $view;
	}

	public function post_add() 
	{
		// assign the POST's data to the model
	    $property = new Property;

		$property->title = Input::get('title');
		$property->description = Input::get('description');
		$property->location = Input::get('location');
		$property->rooms = Input::get('rooms');
		$property->price = Input::get('price');

		$state = State::where_name(Input::get('state'))->first(); // retrieve the state model
		$property->state_id = $state->id; // pass the state id

		$category = Category::where_name(Input::get('category'))->first(); // retrieve the category model
		$property->category_id = $category->id; // pass the category id

		$property->post_code = Input::get('post_code');

		if ($property->save()) {
			return Redirect::back()->with('success', 'Property successfuly added!');
		} else {
			return Redirect::back()->with_errors( $property->errors->all() );
		}

	}



}