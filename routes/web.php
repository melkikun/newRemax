
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

Route::get('properties',function(){
    return view('search');
})->name('properties');

// Route::get('properties/search',[
//    'uses' => 'HomeController@searchHome',
//    'as' =>'search.home',
// ]);

Route::get('property/{listUrl}',[
   'uses' => 'PropertyController@showPropertyDetail',
   'as' => 'property.show',
]);

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
	Route::get('/about', 'AboutController@index')->name("about");
	Route::get('/franchise', 'FranchiseController@index')->name("agent.list");
	Route::get('/agents', 'AgentController@index')->name("agent");
	Route::get('/albums', 'GaleryController@index')->name("gallery");
	Route::get('/news', 'NewsController@index')->name("news");
	Route::get('/contact', 'ContactController@index')->name("contact");

	/*route menu detail*/
	//gallery detail
	Route::get('/gallery/{id}','GalleryDetailController@index')->name("gallery.detail");
	//news detail
	Route::get('/news/{id}', 'NewsController@listNews')->name('news.detail');
	//property detail
	Route::get('/property/{id}', 'PropertyController@listProperty')->name('property.detail');
	//news detail
	Route::get('/news/{id}', 'NewsController@newsDetail')->name('property.detail');
	Route::get("properties/search/", 'PropertyController@search')->name('property.filter');
	Route::get('/{id}', 'AgentController@detailAgent')->name('property.detail');	

	Route::get('cariagen/search','AgentController@searchAgent')->name('property.detail');
});