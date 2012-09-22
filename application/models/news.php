<?php

class News extends Aware {

	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'title' => 'required|max:30',
		'content' => 'required',

	);



}