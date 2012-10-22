<?php

class Admin_News_Controller extends Base_Controller {
	
	public function __construct()
	{
	   parent::__construct();
	   $this->filter('before', 'csrf')->on('post');
	   $this->filter('before', 'auth');
	}

	public $restful = true; 

	/**
	* render add news page
	*/
	public function get_add() 
	{
		$view = View::make('admin.news.add');
		$view['title']  = 'Linq Property: Admin Add News';	
		$view['current_page']  = 'add-news';		
		return $view;
	}

	/**
	* process add news
	*/
	public function post_add() 
	{
	    $news = new News;
		$news->title = Input::get('title');
		$news->content = Input::get('content');
		$news->ranking = Input::get('ranking');

		if ($news->save()) {

			// return print_r($_FILES['picture']);

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
						->save( 'public/uploads/news/' . $new_file_name , 100 );

				    if ( !$success ) {
				        // echo 'failed to upload the image! Property not saved!';
				        echo 'FATAL ERROR: failed uploading the image!';
				        $error_msgs[] = 'FATAL ERROR: failed uploading the image!';

				    } else {
				    	//return 'woo';

				    	 // if all goes well, lets save a record of the image in the database!
				    	$news_image = new NewsImage;
				    	$news_image->name = $new_file_name;
				    	$news_image->news_id = $news->id;

				    	if ($news_image->save()) {
				    		// saving the image record to the dbase success, so lets do nothing
				    		//return 'nice bro';
				    	} else {
				    		// delete the property that has been saved? or ignore it? undecided ryt now,
				    		// maybe lets just deal w/ this next tym, so for now lets just redirect back and show some errors
				    		// but the property recored is saved, not rollbacked, atleast FOR NOW.
				    		$error_msgs[] = 'upload failed';
				    		//return 'upload failed bro';
				    	}
				    	
				    	echo 'upload image sucess';
				    
				    }
	            }
	        }

			return Redirect::back()->with('success', 'News successfuly added!');
		} else {
			return Redirect::back()->with_errors( $news->errors->all() );
		}
	}

	/**
	* render manage news page
	*/
	public function get_index()
	{
		$view = View::make('admin.news.index');
		$view['title']  = 'Linq Property: Admin Manage News';	
		$view['current_page']  = 'manage-news';
	
		$view['news'] = News::paginate(10);
		return $view;
	}

	/**
	* render edit news page
	*/
	public function get_edit($id)
	{
		$view = View::make('admin.news.edit');
		$view['title']  = 'Linq Property: Admin Edit News';	
		$view['current_page']  = 'edit-news';
		$view['news'] = News::find($id);
		return $view;
	}

	/**
	* process news category
	*/
	public function post_edit()
	{
		$news = News::find(Input::get('id'));

		$news->title = Input::get('title');
		$news->content = Input::get('content');
		$news->ranking = Input::get('ranking');

		if ($news->save()) {
			return Redirect::back()->with('success', 'News successfully updated!');
		}

		return Redirect::back()->with_errors( $news->errors->all() );
	}

	/**
	* process delete category
	* REMINDER: change this function to post instead of get to add security.
	*/
	public function get_delete($id)
	{
		$news = News::find($id);

		if (is_null($news)) {
			return Response::error('404');
		}

		// delete all the images related to this news
		foreach ($news->images as $img) {
			$img->delete(); // delete image record 
			File::delete('public/uploads/news/' . $img->name); // delete the image
		}


		$news->delete();

		return Redirect::back()->with('success', 'News successfully deleted!');
	}

	public function get_manage_imgs($id)
	{
		$view = View::make('admin.news.manage_images');
		$view['title']  = 'Linq Property: Admin Manage Images of News';	
		$view['current_page']  = 'manage-images-of-news';

		$view['imgs']  = NewsImage::where_news_id($id)->get();	

		return $view;
	}

	public function post_add_img()
	{

		// validate if the property id is valid
		$news = News::find(Input::get('news_id'));

		//return print_r(Input::file('picture'));

		$rules = array(
			'picture' => 'mimes:jpg,gif,png',
		);

		$input = array(
			'picture' => Input::file('picture'),
		);


		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
			// print_r($validation->errors);
		    return Redirect::back()->with_errors( $validation->errors->all() );
		}
		

		// kill the script if property id is invalid or doesn't exist
		if (is_null($news)) {
			return 'news id doesnt exist! are you cheating?!';
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
				->save( 'public/uploads/news/' . $new_file_name , 100 );

		    if ( !$success ) {
		        // echo 'failed to upload the image! Property not saved!';
		        echo 'FATAL ERROR: failed uploading the image!';
		        $error_msgs[] = 'FATAL ERROR: failed uploading the image!';

		    } else {
		    	// if all goes well, lets save a record of the image in the database!
		    	$news_image = new NewsImage;
		    	$news_image->name = $new_file_name;
		    	$news_image->news_id = $news->id;

		    	if ($news_image->save()) {
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

	/**
	* process delete image
	*/
	public function post_delete_img()
	{
		$img = NewsImage::find(Input::get('img_id'));

		if (is_null($img)) {
			return Response::error('404');
		}

		$img->delete();

		File::delete('public/uploads/news/' . $img->name);

		return Redirect::back()->with('success', 'Image successfully deleted!');
	}



}