<?php

class State extends Aware {

	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'name' => 'required|unique:states|max:60',

	);

	/**
	 * Aware custom messages
	 */
	public static $messages = array(
   		'name_required' => 'State name is required!',
   		'name_unique' => 'The state name already exists!',
	);

	public function properties()
	{
		return $this->has_many('Property');
	}



}