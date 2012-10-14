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

		// return Input::get('keyword');
		$keyword = Input::get('keyword');

		$view = View::make('site.second_find_prop');
		$view['title']  = 'Linq Property: Find a Property';
		$view['current_page']  = 'find-a-property';		

		$cat = Category::where_name($category)->first();
		// return print_r($cat);

		

		if (!empty($keyword)) {
			$properties = Property::where_category_id_and_state($cat->id, $keyword)->paginate(12);
		} else {
			$properties = Property::where_category_id($cat->id)->paginate(12);
		}
		

		$view['properties']  = $properties;		
		return $view;
	}

  	
}
