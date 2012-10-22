<?php

class NewsImage extends Aware {
	
	public static $table = 'news_images';

	public static $timestamps = true;

	/**
	 * Aware validation rules
	 */
	public static $rules = array(
		'name' => 'required|unique:news_images',
		'news_id' => 'required|integer|exists:news,id',

	);

	public function news()
	{
		return $this->belongs_to('News');
	}



}