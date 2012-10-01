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

		if ($news->save()) {
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

		// do not show the uncategorized category to the user to disable editing and deleting it
		$category = Category::where_name('uncategorized')->first();
	
		$view['categories'] = Category::where('id', '!=', $category->id)->paginate(10);
		return $view;
	}

	/**
	* render edit news page
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
	* process news category
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

		// get the id of the uncategorized category
		$uncategorized = Category::where_name('uncategorized')->first();

		// change categories to uncategorized
		$affected = DB::table('properties')
		    ->where('category_id', '=', $category->id)
		    ->update(array('category_id' => $uncategorized->id));


		$category->delete();

		return Redirect::back()->with('success', 'Category successfully deleted!');
	}



}