<?php

class Properties_Controller extends Base_Controller{
  
	public $restful = true; 

	public $layout = 'layouts.default';

	/**
	* render homepage
	*/
	public function get_index()
	{
		$view = View::make('properties.index');

		$this->layout->title = "Linq Property: Home";

		$this->layout->main = $view;
	}	  

  	
}
