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


		$news->delete();

		return Redirect::back()->with('success', 'News successfully deleted!');
	}



}