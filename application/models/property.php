<?php

class Property extends Aware {
	
	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'title' => 'required|max:60',
		'description' => 'required|max:1000',
		'location' => 'required|max:60',
		'rooms' => 'required|integer',
		'price' => 'required|integer',
		'state_id' => 'integer|integer|exists:states,id',
		'category_id' => 'required|integer|exists:categories,id',
		'post_code' => 'required|max:30',
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
		return $this->has_many('PropertyImage');
	}



}