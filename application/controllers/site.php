<?php

class Site_Controller extends Base_Controller {
	
	public $restful = true; 

	/**
	 * render home page
	 */
	 public function get_index() 
	 {
		return View::make('site.index');
	 }

}