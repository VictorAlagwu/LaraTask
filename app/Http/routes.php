<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' =>['web']], function(){

	/*Home and About Section*/
	Route::get('/', 'PagesController@home');
	Route::get('about','PagesController@about');


	/*Card Controller Section*/

	
	/*Main Card Controllers Section*/
	Route::get('card', 'CardsController@index');
	Route::get('card/{card}', 'CardsController@show');
	Route::post('card/create', 'CardsController@create');
	Route::delete('card/{card}/del', 'CardsController@delete');




	/*Note Controller Sectiion*/

	//Add Note
	Route::post('card/{card}/notes', 'NotesController@store');
	//Edit Note 
	Route::get('notes/{note}/edit', 'NotesController@edit');
	//Update Note
	Route::patch('notes/{note}', 'NotesController@update');
	//Delete Note
	Route::delete('notes/{note}/del','NotesController@delete');
});

//Authetication Section
// Auth
Route::group(['middleware' => 'web'], function () {
    // Auth
    Route::auth();
    // Social Auth
    Route::get('social/{provider?}', 'Auth\AuthController@redirectToProvider');
    Route::get('social/{provider?}/callback', 'Auth\AuthController@handleProviderCallback');
});


