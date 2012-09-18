<?php

class Admin_Categories_Controller extends Base_Controller {
	
	public $restful = true; 

	public function get_add() 
	{
		$view = View::make('admin.categories.add_category');
		$view['title']  = 'Linq Property: Admin Add Category';	
		$view['current_page']  = 'add-category';		
		return $view;
	}

	public function post_add() 
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



}