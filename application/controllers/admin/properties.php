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

		// categories
		$categories_array = array();

		$states = State::all();
		$categories = Category::all();

		// check if states and catogies exist, because if there is none, lets abort displaying the form
		if (count($states) === 0) {
			return 'no states in the database yet, please add a state first';
		} elseif (count($categories) === 0) {
			return 'no categories in the database yet, please add a state first';
		} else {

			foreach ($states as $state) {
				$states_array[ $state->name ] = $state->name;
			}

			$view['states_array'] = $states_array;

			foreach ($categories as $category) {
				 $categories_array[ $category->name ] = $category->name;
			}

			$view['categories_array'] = $categories_array;

			return $view;
		}


		
	}

	public function post_add() 
	{
		$error_msgs = array(); // this will hold the error messages generated manually

		$state = State::where_name(Input::get('state'))->first(); // retrieve the state model
		$category = Category::where_name(Input::get('category'))->first(); // retrieve the category model

		// -------------------------------------------------------------------------- //
		// manual validation ######################################################## //
		// -------------------------------------------------------------------------- //

		// get the user input!
		$input = array(
			'title' => Input::get('title'),
			'description' => Input::get('description'),
			'location' => Input::get('location'),
			'rooms' => Input::get('rooms'),
			'price' => Input::get('price'),
			'state_id' => $state->id,
			'category_id' => $category->id,
			'post_code' => Input::get('post_code'),
		);

		//print_r($input);

		// manually add the rules for validating insert using create, because aware doesn't recognize it
		$rules = array(
		    'title' => 'required',
			'description' => 'required',
			'location' => 'required',
			'rooms' => 'required|integer',
			'price' => 'required|integer',
			'state_id' => 'integer|integer|exists:states,id',
			'category_id' => 'required|integer|exists:categories,id',
			'post_code' => 'required',
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
			// print_r($validation->errors);
		    return Redirect::back()->with_errors( $validation->errors->all() );
		}

		// -------------------------------------------------------------------------- //
		// manual validation ends ######################################################## //
		// -------------------------------------------------------------------------- //

		// save the property record to the properties table!
		// the create method returns the instance of the newly created object on success, false on failure
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

		// if saving the property is successful, lets save the uploaded image in the uploads folder
		// and save the image record in the database!
	    if ($property !== FALSE) {

	    	// print_r($_FILES['picture']);

	        // Number of uploaded files
	        $num_files = count($_FILES['picture']['name']);

	        // loop!
	        for ($i=0; $i < $num_files ; $i++) { 

	        	// check if there is a file in the array
	            if(!is_uploaded_file($_FILES['picture']['tmp_name'][$i]))
	            {
	    			// no file upload so do nothing
	            }
	            else
	            {
	            	// pass the current array item to a associative array w/c will hold the current uploaded images
	            	// this is done because the resizer bundle only supports 1 image upload at a time
	            	// so we need to trick it ;)
	           		$converted_file['name'] = $_FILES['picture']['name'][$i];
	           		$converted_file['type'] = $_FILES['picture']['type'][$i];
	           		$converted_file['tmp_name'] = $_FILES['picture']['tmp_name'][$i];
	           		$converted_file['error'] = $_FILES['picture']['error'][$i];
	           		$converted_file['size'] = $_FILES['picture']['size'][$i];

	           		// print_r($converted_file);

	             	// pass the current image
					$img = $converted_file;

					// print_r($img);

				 	$file_type = File::extension($converted_file['name']);
					$timestamp = date("m/d/Y h:i:s a", time());
					$random_chars = Str::random(32);

					// generate a unique filename
					$new_file_name = md5($timestamp . $img['name'] . $random_chars) . '.' .$file_type;

					// save the full image
					$success = Resizer::open( $img )
						->save( 'uploads/properties/' . $new_file_name , 100 );

				    if ( !$success ) {
				        // echo 'failed to upload the image! Property not saved!';
				        echo 'FATAL ERROR: failed uploading the image!';
				        $error_msgs[] = 'FATAL ERROR: failed uploading the image!';

				    } else {
				    	 // if all goes well, lets save a record of the image in the database!
				    	$property_image = new PropertyImage;
				    	$property_image->name = $new_file_name;
				    	$property_image->property_id = $property->id;

				    	if ($property_image->save()) {
				    		// saving the image record to the dbase success, so lets do nothing
				    	}
				    	else {
				    		// delete the property that has been saved? or ignore it? undecided ryt now,
				    		// maybe lets just deal w/ this next tym, so for now lets just redirect back and show some errors
				    		// but the property recored is saved, not rollbacked, atleast FOR NOW.
				    		$error_msgs[] = 'upload failed';
				    	}
				    	
				    	echo 'upload image sucess';
				    
				    }
	            }
	        }

	        // redirect back if there are errors. RETURN stop the execution.
	        if (count($error_msgs) > 0) {
	        	return Redirect::back()->with('errors', $error_msgs);
	        }

	        // if we reach here, that means all is good. lets redirect them back and give them a 
	        // success msg.
	       	return Redirect::back()->with('success', 'Property successfully added!');
			
		} else {
			$error_msgs[] = 'FATAL ERROR! Inserting property to database failed!';
			return Redirect::back()->with('errors', $error_msgs);
		}

	}

























}