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
	 //    $property = new Property;

		// $property->title = Input::get('title');
		// $property->description = Input::get('description');
		// $property->location = Input::get('location');
		// $property->rooms = Input::get('rooms');
		// $property->price = Input::get('price');

		// $state = State::where_name(Input::get('state'))->first(); // retrieve the state model
		// $property->state_id = $state->id; // pass the state id

		// $category = Category::where_name(Input::get('category'))->first(); // retrieve the category model
		// $property->category_id = $category->id; // pass the category id

		// $property->post_code = Input::get('post_code');

		$state = State::where_name(Input::get('state'))->first(); // retrieve the state model
		$category = Category::where_name(Input::get('category'))->first(); // retrieve the category model

		$property = Property::create(array(
				'title' => Input::get('title'),
				'description' => Input::get('description'),
				'location' => Input::get('location'),
				'rooms' => Input::get('rooms'),
				'price' => Input::get('price'),
				'state_id' => $state->id,
				'category_id' => $category->id,
				'post_code' => Input::get('post_code'),
			));

		//var_dump($property);

		// echo $property->id; 

		
		// get the uploaded picture
		$img = Input::file('picture');

		// print_r($img);

	 	$file_type = File::extension($img['name']);
		$timestamp = date("m/d/Y h:i:s a", time());
		$random_chars = Str::random(32);

		// generate a unique filename
		$new_file_name = md5($timestamp . $img['name'] . $random_chars) . '.' .$file_type;

		// save the full image
		$success = Resizer::open( $img )
			->save( 'public/img/properties/' . $new_file_name , 100 );

		// Save a thumbnail
	    $success = Resizer::open( $img )
	        ->resize( 200 , 200 , 'crop' )
	        ->save( 'public/img/properties/thumbs/' . $new_file_name , 100 );

	    if ( !$success ) {
	        return 'failed to upload the image! Property not saved';
	    }

	    if ($property !== FALSE) {

	    	$property_image = new PropertyImage;
	    	$property_image->name = $new_file_name;
	    	$property_image->property_id = $property->id;

	    	if ($property_image->save()) {
	    		return Redirect::back()->with('success', 'Property successfuly added!');
	    	}
	    	else {
	    		// delete the property that has been saved! or ignore it? you decide programmer
	    		return Redirect::back()->with_errors( $property->errors->all() );
	    	}
			
		} else {
			return Redirect::back()->with_errors( $property->errors->all() );
		}

	}



}