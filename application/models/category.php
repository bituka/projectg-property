<?php

class Category extends Aware {

	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'name' => 'required|unique:categories',

	);

	/**
	 * Aware custom messages
	 */
	public static $messages = array(
   		'name_required' => 'Category name is required!',
   		'name_unique' => 'The category name already exists!',
	);

	public function properties()
	{
		return $this->has_many('Property');
	}



}