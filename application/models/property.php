<?php

class Property extends Aware {
	
	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'location' => 'required',
		'rooms' => 'required|integer',
		'price' => 'required|integer',
		'state_id' => 'integer',
		'category_id' => 'required|integer',
		'date_sold' => '',
		'post_code' => 'required',
	);

	public function state()
	{
		return $this->belongs_to('State');
	}

	public function category()
	{
		return $this->belongs_to('Category');
	}

	public function images()
	{
		return $this->has_many('Property_images');
	}



}