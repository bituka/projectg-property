<?php

class State extends Aware {

	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'name' => 'required|unique:states',

	);

	public function properties()
	{
		return $this->has_many('Property');
	}



}