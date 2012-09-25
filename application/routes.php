<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{	
|			return "Welcome, $name.";
|		});
|
*/




/**
 * register NESTED controllers here
 */
Route::controller( array(
	'admin.dashboard',
	'admin.properties',
	'admin.categories',
	'admin.states',

) );
// --- register NESTED controllers here ENDS --- //






/**
 *	custom routes that uses NESTED CONTROLLERS
 */






// -- custom routes that uses NESTED CONTROLLERS ENDS -- //






/**
 * register NOT NESTED controllers here
 */
Route::controller( array(
	'site',
	'properties',

) );
// -- register NOT NESTED controllers here ENDS -- //




	


/**
 *	custom routes that uses NOT NESTED CONTROLLERS
 */

// find property
Route::get('find_prop', array('uses' => 'site@find_prop'));



// login
Route::any('login', 'site@login');


// logout
Route::get('logout', array('as' => 'logout', 'uses' => 'site@logout'));



Route::get('hash', function() {
	echo $pass = Hash::make('kebs');
});



//Route::get('/', array('uses' => 'site@index')); // default route, for home page
//Route::get('find_prop', array('uses' => 'site@find_prop'));
//Route::get('about', array('uses' => 'site@about'));	



// default route, for home page
Route::get('/', array('uses' => 'site@index')); 

	





// --- custom routes that uses NOT NESTED CONTROLLERS ENDS --- //







/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...


	// if (URI::segment(1) == 'properties' AND URI::segment(3) == 'edit' ) {
	// 	return Controller::call('admin.properties@edit', array(URI::segment(2)));
	// }

});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to_action('site@login');
});
