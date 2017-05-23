
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['domain' => '{account}.'.env('APP_DOMAIN_NAME')], function () {

	// route home
	Route::get('', 'HomeController@index');
	// route about
	Route::get('/about', 'AboutController@index');
	// route franchise
	Route::get('/franchise', 'FranchiseController@index');
	// route agent
	Route::get('/agents', 'AgentController@index');
	// route gallerys
	Route::get('/albums', 'GaleryController@index');
	// route news
	Route::get('/news', 'NewsController@index');
	// route contact
	Route::get('/contact', 'ContactController@index');
	//property
	Route::get('properties', 'PropertyController@index')->name('properties');
	//gallery detail
	Route::get('/albums/{id}','GalleryDetailController@index')->name("gallery.detail");
	//news detail
	Route::get('/news/{id}', 'NewsController@listNews')->name('news.detail');
	//news detail
	Route::get('/news/{id}', 'NewsController@newsDetail')->name('property.detail');
	//agent detail
	Route::get('/{id}', 'AgentController@detailAgent')->name('property.detail');	
	// agent search
	Route::get('cariagen/search','AgentController@searchAgent')->name('property.detail');
	//property detail
	Route::get('property/{id}', 'PropertyController@showPropertyDetail')->name('properties');
});