<?php

class Admin_Categories_Controller extends Base_Controller {
	
	public function __construct()
	{
	    parent::__construct();
	    $this->filter('before', 'csrf')->on('post');
	    $this->filter('before', 'auth');
	}

	public $restful = true; 

	/**
	* render add category page
	*/
	public function get_add() 
	{
		$view = View::make('admin.categories.add_category');
		$view['title']  = 'Linq Property: Admin Add Category';	
		$view['current_page']  = 'add-category';		
		return $view;
	}

	/**
	* process add category
	*/
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

	/**
	* render manage categories page
	*/
	public function get_index()
	{
		$view = View::make('admin.categories.index');
		$view['title']  = 'Linq Property: Admin Manage Categories';	
		$view['current_page']  = 'manage-categories';
		$view['categories'] = Category::paginate(10);
		return $view;
	}

	/**
	* render edit category page
	*/
	public function get_edit($id)
	{
		$view = View::make('admin.categories.edit');
		$view['title']  = 'Linq Property: Admin Edit Category';	
		$view['current_page']  = 'edit-category';
		$view['category'] = Category::find($id);
		return $view;
	}

	/**
	* process edit category
	*/
	public function post_edit()
	{
		$category = Category::find(Input::get('id'));

		$category->name = Input::get('name');

		if ($category->save()) {
			return Redirect::back()->with('success', 'Category successfully updated!');
		}

		return Redirect::back()->with_errors( $category->errors->all() );
	}

	/**
	* process delete category
	* REMINDER: change this function to post instead of get to add security.
	*/
	public function get_delete($id)
	{
		$category = Category::find($id);

		if (is_null($category)) {
			return Response::error('404');
		}

		$category->delete();

		return Redirect::back()->with('success', 'Category successfully deleted!');
	}



}