<?php

class Category extends Aware {

	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'name' => 'required|unique:categories',

	);

	public function properties()
	{
		return $this->has_many('Property');
	}



}