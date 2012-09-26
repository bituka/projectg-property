<?php

class Admin_Properties_Controller extends Base_Controller {
	
	public function __construct()
	{
	    parent::__construct();
	    $this->filter('before', 'csrf')->on('post');
	    $this->filter('before', 'auth');
	}

	public $restful = true; 

	/**
	* render add property page
	*/
	public function get_add() 
	{
		$view = View::make('admin.properties.add_property');
		$view['title']  = 'Linq Property: Admin Add Property';	
		$view['current_page']  = 'add-property';		
		$view['categories'] = Category::all();

		// categories
		$categories_array = array();

		// $states = State::all();
		$categories = Category::all();

		// check if catogories exist, because if there is none, lets abort displaying the form
		if (count($categories) === 0) {
			return 'no categories in the database yet, please add a category first';
		} else {

			foreach ($categories as $category) {
				 $categories_array[ $category->name ] = $category->name;
			}

			$view['categories_array'] = $categories_array;

			return $view;
		}
	}

	/**
	* process add property
	*/
	public function post_add() 
	{
		$error_msgs = array(); // this will hold the error messages generated manually

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
			'state' => Input::get('state'),
			'category_id' => $category->id,
			'post_code' => Input::get('post_code'),
		);

		//print_r($input);

		// manually add the rules for validating insert using create, because aware bundle doesn't recognize it
		$rules = array(
		    'title' => 'required',
			'description' => 'required',
			'location' => 'required',
			'rooms' => 'required|integer',
			'price' => 'required|integer',
			'state' => 'required|max:30',
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
				'state' => Input::get('state'),
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
						// ->resize( 300 , 300 , 'auto' )
						->save( 'public/uploads/properties/' . $new_file_name , 100 );

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
				    	} else {
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

	/**
	* render manage properties page
	*/
	public function get_index()
	{
		$view = View::make('admin.properties.index');
		$view['title']  = 'Linq Property: Admin Manage properties';	
		$view['current_page']  = 'manage-properties';
		$view['properties'] = Property::paginate(10);
		return $view;
	}

	/**
	* render edit property page
	*/
	public function get_edit($id)
	{
		$view = View::make('admin.properties.edit');
		$view['title']  = 'Linq Property: Admin Edit Property';	
		$view['current_page']  = 'edit-property';
		$view['property'] = Property::find($id);

		$view['categories'] = Category::all();

		// categories
		$categories_array = array();

		$categories = Category::all();

		// check if categories exist, because if there is none, lets abort displaying the form
		if (count($categories) === 0) {
			return 'no categories in the database yet, please add a category first';
		} else {

			foreach ($categories as $category) {
				 $categories_array[ $category->name ] = $category->name;
			}

			$view['categories_array'] = $categories_array;
		}

		return $view;
	}

	/**
	* process edit property
	*/
	public function post_edit()
	{
		$category = Category::where_name(Input::get('category'))->first();

		// get the property model
		$property = Property::find(Input::get('id'));

		// asign values
		$property->title = Input::get('title');
		$property->description = Input::get('description');
		$property->location = Input::get('location');
		$property->rooms = Input::get('rooms');
		$property->price = Input::get('price');
		$property->state = Input::get('state');
		$property->category_id = $category->id;
		$property->post_code = Input::get('post_code');

		// save
		if ($property->save()) {
			return Redirect::back()->with('success', 'Property successfully updated!');
		}

		return Redirect::back()->with_errors( $property->errors->all() );
	}

	/**
	* process delete property
	* REMINDER: change this function to post instead of get to add security.
	*/
	public function get_delete($id)
	{
		$property = Property::find($id);

		// delete all the images related to this property
		foreach ($property->images as $img) {
			$img->delete(); // delete image record 
			File::delete('public/uploads/properties/' . $img->name); // delete the image
		}

		if (is_null($property)) {
			return Response::error('404');
		}

		$property->delete();

		return Redirect::back()->with('success', 'Property successfully deleted!');
	}

	/**
	* render manage images page
	*/
	public function get_manage_imgs($id)
	{
		$view = View::make('admin.properties.manage_images');
		$view['title']  = 'Linq Property: Admin Manage Images of Property';	
		$view['current_page']  = 'manage-images-of-property';

		$view['imgs']  = PropertyImage::where_property_id($id)->get();	

		return $view;
	}

	/**
	* process delete image
	*/
	public function post_delete_img()
	{
		$img = PropertyImage::find(Input::get('img_id'));

		if (is_null($img)) {
			return Response::error('404');
		}

		$img->delete();

		File::delete('public/uploads/properties/' . $img->name);

		return Redirect::back()->with('success', 'Image successfully deleted!');
	}

	/**
	* process add image
	*/
	public function post_add_img()
	{
		// validate if the property id is valid
		$property = Property::find(Input::get('property_id'));

		// kill the script if property id is invalid or doesn't exist
		if (is_null($property)) {
			return 'property id doesnt exist! are you cheating?!';
		}


		// check if there is a file in the array
        if(!is_uploaded_file($_FILES['picture']['tmp_name']))
        {
			// no file upload so lets redirect them back with an error msg
			//return Redirect::back();
			//return Redirect::to_action('admin.properties@manage_imgs', array(Input::get('property_id')));
        	return Redirect::back()->with('errors', 'Upload failed. You must choose an image to be uploaded');
        }
        else
        {
        	// pass the current array item to a associative array w/c will hold the current uploaded images
        	// this is done because the resizer bundle only supports 1 image upload at a time
        	// so we need to trick it ;)
       		$converted_file['name'] = $_FILES['picture']['name'];
       		$converted_file['type'] = $_FILES['picture']['type'];
       		$converted_file['tmp_name'] = $_FILES['picture']['tmp_name'];
       		$converted_file['error'] = $_FILES['picture']['error'];
       		$converted_file['size'] = $_FILES['picture']['size'];

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
				//->resize( 500 , 500 , 'auto' )
				->save( 'public/uploads/properties/' . $new_file_name , 100 );

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

		    	return Redirect::back()->with('success', 'Image successfully added!');

		    }
        }


	}


























}