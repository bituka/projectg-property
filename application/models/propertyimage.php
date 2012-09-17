<?php

class PropertyImage extends Aware {
	
	public static $table = 'property_images';

	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'name' => 'required|unique:property_images',
		'property_id' => 'required|integer|exists:properties,id',

	);

	public function property()
	{
		return $this->belongs_to('Property');
	}



}