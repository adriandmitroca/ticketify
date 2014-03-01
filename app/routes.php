<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

Route::get('/events', array(
	'as' => 'events',
	'uses' => 'EventController@showEvents'
));

Route::get('/event/{id}', array(
	'as' => 'event-details',
	'uses' => 'EventController@eventDetails'
));

Route::group(array('before' => 'auth'), function() {

	Route::group(array('before' => 'csfr'), function() {
		Route::post('/account/change-password', array(
			'as' => 'account-change-password',
			'uses' => 'AccountController@postChangePassword'
		));

		Route::post('/account/settings', array(
			'as' => 'account-settings',
			'uses' => 'AccountController@postChangeSettings'
		));

		Route::post('/event/{id}/buy', array(
			'as' => 'event-buy',
			'uses' => 'EventController@postEventBuy'
		));	
});

	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));

	Route::get('/account/settings', array(
		'as' => 'account-settings',
		'uses' => 'AccountController@getChangeSettings'
	));

	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	Route::get('/orders', array(
		'as' => 'orders',
		'uses' => 'OrderController@listOrders'
	));

	Route::get('/event/{id}/buy', array(
		'as' => 'event-buy',
		'uses' => 'EventController@getEventBuy'
	));
});

Route::group(array('before' => 'guest'), function() {

	Route::group(array('before' => 'csrf'), function () {
		Route::post('/account/create', array(
			'as' => 'account-create',
			'uses' => 'AccountController@postCreate'
		));

		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in',
			'uses' => 'AccountController@postSignIn'
		));

	});

	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));

	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));
});