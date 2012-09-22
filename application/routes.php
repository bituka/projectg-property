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

// properties
Route::get('properties', array('as' => 'properties', 'before' => 'auth', 'uses' => 'admin.properties@index'));
Route::get('properties/add', array('as' => 'add_property', 'before' => 'auth', 'uses' => 'admin.properties@add'));
Route::post('properties/add', array('before' => 'auth|csrf', 'uses' => 'admin.properties@add'));
Route::get('properties/(:any)/edit', array('as' => 'edit_property', 'before' => 'auth', 'uses' => 'admin.properties@edit'));
Route::post('properties/(:any)/edit', array('before' => 'auth', 'uses' => 'admin.properties@edit'));
Route::get('properties/(:any)/delete', array('as' => 'delete_property', 'before' => 'auth', 'uses' => 'admin.properties@delete'));



// states
Route::get('states', array('as' => 'states', 'before' => 'auth', 'uses' => 'admin.states@index'));
Route::get('states/add', array('as' => 'add_state', 'before' => 'auth', 'uses' => 'admin.states@add'));
Route::post('states/add', array('before' => 'auth|csrf', 'uses' => 'admin.states@add'));
Route::get('states/(:any)/edit', array('as' => 'edit_state', 'before' => 'auth', 'uses' => 'admin.states@edit'));
Route::post('states/(:any)/edit', array('before' => 'auth', 'uses' => 'admin.states@edit'));
Route::get('states/(:any)/delete', array('as' => 'delete_state', 'before' => 'auth', 'uses' => 'admin.states@delete'));



// categories
Route::get('categories', array('as' => 'categories', 'before' => 'auth', 'uses' => 'admin.categories@index'));
Route::get('categories/add', array('as' => 'add_category', 'before' => 'auth', 'uses' => 'admin.categories@add'));
Route::post('categories/add', array('before' => 'auth|csrf', 'uses' => 'admin.categories@add'));
Route::get('categories/(:any)/edit', array('as' => 'edit_category', 'before' => 'auth', 'uses' => 'admin.categories@edit'));
Route::post('categories/(:any)/edit', array('before' => 'auth', 'uses' => 'admin.categories@edit'));
Route::get('categories/(:any)/delete', array('as' => 'delete_category', 'before' => 'auth', 'uses' => 'admin.categories@delete'));



// dashboard for admin
Route::get('dashboard', array('as' => 'dashboard', 'before' => 'auth', 'uses' => 'admin.dashboard@index'));


// -- custom routes that uses NESTED CONTROLLERS ENDS -- //


Route::get('test', function(){

	$p = Property::find(1);
	$p->title = 'testing';
	$p->save();
});




/**
 * register NOT NESTED controllers here
 */
Route::controller( array(
	'site',
	'properties',

) );
// -- register NOT NESTED controllers here ENDS -- //




//Route::get('/', array('uses' => 'site@index')); // default route, for home page
//Route::get('find_prop', array('uses' => 'site@find_prop'));
//Route::get('about', array('uses' => 'site@about'));		


/**
 *	custom routes that uses NOT NESTED CONTROLLERS
 */

// find property
Route::get('find_prop', array('uses' => 'site@find_prop'));



// login
Route::get('login', array('as' => 'login', 'uses' => 'site@login'));
Route::post('login', array('before' => 'csrf', 'uses' => 'site@login'));



// logout
Route::get('logout', array('as' => 'logout', 'uses' => 'site@logout'));



Route::get('hash', function() {
	echo $pass = Hash::make('kebs');
});



Route::get('test_models', function() {

	// ---- insert and inserting validations for models (PASSED) ----- //

	// insert group
	// $group = new Group;

	// $group->name = 'admin';
	// $group->description = 'administrator';

	// if ($group->save())
	// {
	// 	echo 'save successful';	
	// }
	// else
	// {
	// 	echo 'error!';
	// 	var_dump($group->errors->all());
	// }


	// insert user
	// $user = new User;

	// $user->username = 'admins';
	// $user->password = 'administrator';
	// $user->email = 'admin@gmails.com';
	// $user->first_name = 'administrator';
	// $user->last_name = 'admin';
	// $user->group_id = '4';

	// if ($user->save())
	// {
	// 	echo 'save successful';	
	// }
	// else
	// {
	// 	echo 'error!';
	// 	var_dump($user->errors->all());
	// }


	// insert categories
	// $category = new Category;

	// $category->name = 'houses';

	// if ($category->save())
	// {
	// 	echo 'save successful';	
	// }
	// else
	// {
	// 	echo 'error!';
	// 	var_dump($category->errors->all());
	// }


	// insert states
	// $state = new State;

	// $state->name = 'legazpi';

	// if ($state->save())
	// {
	// 	echo 'save successful';	
	// }
	// else
	// {
	// 	echo 'error!';
	// 	var_dump($state->errors->all());
	// }


	// insert news
	// $news = new News;

	// $news->title = 'hehe';
	// $news->content = 'haha';

	// if ($news->save())
	// {
	// 	echo 'save successful';	
	// }
	// else
	// {
	// 	echo 'error!';
	// 	var_dump($news->errors->all());
	// }


	// insert properties
	// $property = new Property;

	// $property->title = 'hehe';
	// $property->description = 'haha';
	// $property->location = 'haha';
	// $property->rooms = '2';
	// $property->price = '3000';
	// $property->state_id = '1';
	// $property->category_id = '1';
	// $property->date_sold = 'haha';
	// $property->post_code = 'haha';

	// if ($property->save())
	// {
	// 	echo 'save successful';	
	// }
	// else
	// {
	// 	echo 'error!';
	// 	var_dump($property->errors->all());
	// }


	// insert property image
	// $prop_img = new PropertyImage;

	// $prop_img->name = 'image002';
	// $prop_img->property_id = '2';

	// if ($prop_img->save())
	// {
	// 	echo 'save successful';	
	// }
	// else
	// {
	// 	echo 'error!';
	// 	var_dump($prop_img->errors->all());
	// }

});



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
	if (Auth::guest()) return Redirect::to_route('login');
});
