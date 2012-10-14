<?php

class Properties_Controller extends Base_Controller{
  
	public $restful = true; 


	/**
	* render homepage
	*/
	// public function get_index()
	// {
	// 	$view = View::make('properties.index');

	// 	$this->layout->title = "Linq Property: Home";

	// 	$this->layout->main = $view;
	// }	  

	public function get_search($category)
	{
		$view = View::make('site.second_find_prop');
		$view['title']  = 'Linq Property: Find a Property';
		$view['current_page']  = 'find-a-property';		

		$cat = Category::where_name($category)->first();

		// return print_r($cat);

		$view['properties']  = Property::where_category_id($cat->id)->paginate(12);		
		return $view;
	}

  	
}
