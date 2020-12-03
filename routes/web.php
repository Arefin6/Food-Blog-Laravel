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

Route::get('/result',function(){
	
    $posts= \App\Post :: where('title','like', '%'. request('search').'%')->get();
   
   
   return view('results')->with('posts',$posts)
   
                         ->with('title','Search result :',request('search'))
                             
                         ->with('settings',\App\Settings::first())
                        
                         ->with('categories',\App\Category::take(4)->get())
   
                         ->with('search',request('search'));
   
   
   
       
   });

Route::get('/', [
	
    'uses' => 'FrontendController@index',

    'as' => 'index'
]);
Route::get('/post/{slug}', [
	
    'uses' => 'FrontendController@singlepost',

    'as' => 'post.single'
]);
Route::get('/category/{id}', [
	
    'uses' => 'FrontendController@category',

    'as' => 'category.single'
    
]);





Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],  function(){

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);
    //users

    Route::get('/users', [
        'uses' => 'HomeController@users',
        'as' => 'users'
    ]);
    Route::get('/user/delete/{id}', [
        'uses' => 'HomeController@userDelete',
        'as' => 'user.delete'
    ]);

    //settings
    Route::get('/settings',[
		'uses'=>'SettingsController@index',
		'as'=>'settings'
		 
	]);
	
   Route::Post('/settings/update',[
	   
		'uses'=>'settingsController@update',
		'as'=>'settings.update'
		 
	]);

    //Category 
    Route::get('/category/create', [
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);
    Route::post('/category/store', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);
    Route::get('/categories', [
        'uses' => 'CategoryController@index',
        'as' => 'category.index'
    ]);
    Route::get('/category/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);
    Route::post('/category/update/{id}', [
        'uses' => 'CategoryController@update',
        'as' => 'category.update'
    ]);
    Route::get('/category/delete/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => 'category.delete'
    ]);

    //Tags

    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);
    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);
    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);
    Route::get('/tags/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);
    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);
    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);
    

    //posts

    Route::get('/post/create', [
        'uses' => 'PostController@create',
        'as' => 'post.create'
    ]);
    
    Route::post('/post/store', [
        'uses' => 'PostController@store',
        'as' => 'post.store'
    ]);

    Route::get('/posts', [
        'uses' => 'PostController@index',
        'as' => 'posts'
    ]);
    Route::get('/posts/edit/{id}', [
        'uses' => 'PostController@edit',
        'as' => 'post.edit'
    ]);
    Route::post('/posts/update/{id}', [
        'uses' => 'PostController@update',
        'as' => 'post.update'
    ]);

	Route::get('/posts/delete/{id}', [
        'uses' => 'PostController@destroy',
        'as' => 'post.delete'
    ]);


});


