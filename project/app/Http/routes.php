<?php Route::get('/', 'WelcomeController@index');

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

Route::get('publishers/list', 'PublisherController@index');
Route::get('publishers/{id}', 'PublisherController@show');


Route::get('authors/list', 'AuthorController@index');
Route::get('authors/{id}', 'AuthorController@show');


Route::get('books/highlighted', 'BookController@index');
Route::get('books/{id}', 'BookController@show');
Route::get('books/search/{keyword}/{offset?}/{limit?}', 'BookController@search');