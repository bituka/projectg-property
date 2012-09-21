<?php

class Group extends Aware {
	
	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'name' => 'required|unique:groups|max:20',
		'description' => 'required|max:100',
	
	);

	public function users()
	{
		return $this->has_many('User');
	}



}