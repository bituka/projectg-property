<?php

class Property_images extends Aware {
	
	public static $table = 'property_images';

	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'name' => 'required',
		'property_id' => 'required|integer',

	);

	public function property()
	{
		return $this->belongs_to('Property');
	}



}