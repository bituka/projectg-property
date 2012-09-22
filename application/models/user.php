<?php

class User extends Aware {
	
	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'username' => 'required|min:5|max:24|unique:users',
		'password' => 'required|min:5|max:100',
		'email' => 'required|email|unique:users|max:100',
		'first_name' => 'required|max:100|max:50',
		'last_name' => 'required|max:100|max:50',
		'group_id' => 'required|integer|exists:groups,id',
	);


	public function group()
	{
		return $this->belongs_to('Group');
	}



}