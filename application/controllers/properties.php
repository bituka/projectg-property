<?php

class Properties_Controller extends Base_Controller{
  
	public $restful = true; 

	public function get_index() 
	{
		$view = View::make('properties.second-index');
		$view['title']  = 'Linq Property: Find a Property';
		$view['current_page']  = 'find-a-property';	

		$keyword = Input::get('keyword');

		$filter = Input::get('filter');

		if (!empty($keyword)) {

			if (!empty($filter)) {

				if ($filter == 'most-recent') {
					// $properties = Property::with(array('images'))->where_state($keyword)->order_by('created_at', 'desc')->paginate(12);
					$properties = Property::with(array('images'))->where('state', 'LIKE', '%' . $keyword . '%')->order_by('created_at', 'desc')->paginate(12);
				} else {
					// $properties = Property::with(array('images'))->where_state($keyword)->order_by('ranking', 'desc')->paginate(12);
					$properties = Property::with(array('images'))->where('state', 'LIKE', '%' . $keyword . '%')->order_by('ranking', 'desc')->paginate(12);
				}

				
			} else {
				// $properties = Property::with(array('images'))->where_state($keyword)->order_by('created_at', 'asc')->paginate(12);
				$properties = Property::with(array('images'))->where('state', 'LIKE', '%' . $keyword . '%')->order_by('created_at', 'asc')->paginate(12);
			}

		} else {

			if (!empty($filter)) {
				
				if ($filter == 'most-recent') {
					$properties = Property::with(array('images'))->order_by('created_at', 'desc')->paginate(12);
				} else {
					$properties = Property::with(array('images'))->order_by('ranking', 'desc')->paginate(12);
				}

			} else {
				$properties = Property::with(array('images'))->paginate(12);
			}

			
		}

		$view['properties']  = $properties;	
		return $view;
	}

	public function get_search($category)
	{
		$keyword = Input::get('keyword');

		$view = View::make('properties.index');
		$view['title']  = 'Linq Property: Find a Property';
		$view['current_page']  = 'find-a-property';		

		$cat = Category::where_name($category)->first();



		// if (!empty($keyword)) {
		// 	$properties = Property::where_category_id_and_state($cat->id, $keyword)->paginate(12);
		// } else {
		// 	$properties = Property::where_category_id($cat->id)->paginate(12);
		// }
		
		// $view['properties']  = $properties;
				
		// return $view;






		$filter = Input::get('filter');

		if (!empty($keyword)) {

			if (!empty($filter)) {

				if ($filter == 'most-recent') {
					// $properties = Property::with(array('images'))->where_state($keyword)->order_by('created_at', 'desc')->paginate(12);
					$properties = Property::with(array('images'))->where('state', 'LIKE', '%' . $keyword . '%')->where_category_id($cat->id)->order_by('created_at', 'desc')->paginate(12);
				} else {
					// $properties = Property::with(array('images'))->where_state($keyword)->order_by('ranking', 'desc')->paginate(12);
					$properties = Property::with(array('images'))->where('state', 'LIKE', '%' . $keyword . '%')->where_category_id($cat->id)->order_by('ranking', 'desc')->paginate(12);
				}

				
			} else {
				//$properties = Property::with(array('images'))->where_category_id_and_state($cat->id, $keyword)->order_by('created_at', 'asc')->paginate(12);
				// $properties = Property::with(array('images'))->where_category_id_and_state($cat->id, $keyword)->order_by('created_at', 'asc')->paginate(12);
				$properties = Property::with(array('images'))->where('state', 'LIKE', '%' . $keyword . '%')->where_category_id($cat->id)->order_by('ranking', 'desc')->paginate(12);
			}

		} else {

			if (!empty($filter)) {
				
				if ($filter == 'most-recent') {
					$properties = Property::with(array('images'))->where_category_id($cat->id)->order_by('created_at', 'desc')->paginate(12);
				} else {
					$properties = Property::with(array('images'))->where_category_id($cat->id)->order_by('ranking', 'desc')->paginate(12);
				}

			} else {
				$properties = Property::with(array('images'))->where_category_id($cat->id)->paginate(12);
			}

			
		}

		$view['properties']  = $properties;	
		return $view;
	}

	public function get_property($id)
	{
		return View::make('properties.index')
			->with('property', Property::find($id))
			->with('title', 'Linq Property: Property')
			->with('current_page', 'property');
	}

  	
}
