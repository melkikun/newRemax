
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

// use Illuminate\Support\Facades\Route;

// Route::get('/','HomeController@getData')->name('/');

// Route::get('properties',function(){
//     return view('search');
// })->name('properties');

// Route::get('properties/search',[
//    'uses' => 'HomeController@searchHome',
//    'as' =>'search.home',
// ]);

// Route::get('property/{listUrl}',[
//    'uses' => 'PropertyController@showPropertyDetail',
//    'as' => 'property.show',
// ]);

// Route::get('agents','AgentController@getData')->name('agents');

// Route::get('franchise','FranchiseController@getData')->name('franchise');

// Route::get('albums','GaleryController@getGallery')->name('albums');

// Route::get('gallery/{id}',[
//     'uses' => 'GalleryDetailController@getGalleryDetail',
//     'as' => 'gallery.detail',
// ]);


// Route::get('contact','ContactController@getData')->name('contact');

// Route::get('news','NewsController@getData')->name('news');

// Route::get('about','AboutController@getData')->name('about');


// Route::get('news/{id}','NewsController@newsDetail')->name('news.detail');


Route::group(['domain' => '{account}.localhost'], function () {

	/*route menu utama*/
	Route::get('', 'HomeController@index')->name("homepage");
	Route::get('/about', 'IndexController@about')->name("about");
	Route::get('/franchise', 'IndexController@franchise')->name("agent.list");
	Route::get('/agents', 'IndexController@agent')->name("agent");
	Route::get('/albums', 'IndexController@gallery')->name("gallery");
	Route::get('/news', 'NewsController@getData')->name("news");
	Route::get('/properties', 'IndexController@property')->name("property");
	Route::get('/contact', 'IndexController@contact')->name("contact");

	/*route menu detail*/
	//gallery detail
	Route::get('/albums/{id}','GalleryController@listDetail')->name("gallery.detail");
	//news detail
	Route::get('/news/{id}', 'NewsController@listNews')->name('news.detail');
	//property detail
	Route::get('/property/{id}', 'PropertyController@listProperty')->name('property.detail');
	//news detail
	Route::get('/news/{id}', 'NewsController@listNews')->name('property.detail');
	//agent detail
	Route::get('/agents/{id}', 'AgentController@alphabethAgent')->name('property.detail');

	Route::get("properties/search/", 'PropertyController@search')->name('property.filter');

	Route::get('/{id}', 'AgentController@listAgent')->name('property.detail');	

	Route::get('agents/searh','AgentController@alphabethAgent')->name('property.detail');
});