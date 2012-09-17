<?php

class User extends Aware {
	
	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'username' => 'required|min:5|unique:users',
		'password' => 'required|min:5',
		'email' => 'required|email|unique:users',
		'first_name' => 'required|max:100',
		'last_name' => 'required|max:100',
		'group_id' => 'required|integer|exists:groups,id',
	);


	public function group()
	{
		return $this->belongs_to('Group');
	}



}