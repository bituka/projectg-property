<?php

class Properties_Controller extends Base_Controller{
  
	public $restful = true; 

	public function get_search($category)
	{
		$keyword = Input::get('keyword');

		$view = View::make('site.second_find_prop');
		$view['title']  = 'Linq Property: Find a Property';
		$view['current_page']  = 'find-a-property';		

		$cat = Category::where_name($category)->first();

		if (!empty($keyword)) {
			$properties = Property::where_category_id_and_state($cat->id, $keyword)->paginate(12);
		} else {
			$properties = Property::where_category_id($cat->id)->paginate(12);
		}
		
		$view['properties']  = $properties;
				
		return $view;
	}

	public function get_property($id)
	{
		return View::make('properties.single')
			->with('property', Property::find($id))
			->with('title', 'Linq Property: Property')
			->with('current_page', 'property');
	}

  	
}
