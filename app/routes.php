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
// Route::get('home/index', function(){return 123;});

// Route::resource('home', 'HomeController');

// Route::controllers('HomeController');
Route::any('upload_image', array('as' => 'upload.image', 'uses' => 'Controllers\FilehandlerController@upload_image'));

Route::group(array('prefix' => 'admin'), function(){
    // 使用者
    Route::group(array('prefix' => 'users'), function(){
        Route::any('login', array('as' => 'user.login', 'uses' => 'Controllers\Admin\UsersController@login'));
        Route::any('logout', array('as' => 'user.logout', 'uses' => 'Controllers\Admin\UsersController@logout'));
    });
});

Route::group(array('prefix' => 'admin', 'before'=>'auth'), function(){
    // 產品
    Route::resource('product', 'Controllers\Admin\ProductController');
    Route::group(array('prefix' => 'product'), function(){
        // 分類
        Route::group(array('prefix' => 'taxonomy'), function(){
            Route::get('index', array('as' => 'taxonomy', 'uses' => 'Controllers\Admin\TaxonomyController@index'));
            Route::get('getItems/{parent_id?}', 'Controllers\Admin\TaxonomyController@getItems');
            Route::post('edit', 'Controllers\Admin\TaxonomyController@edit');
            Route::get('taxo_list', 'Controllers\Admin\TaxonomyController@taxo_list');
            Route::post('add_taxonomy', 'Controllers\Admin\TaxonomyController@add_taxonomy');
            Route::post('updateStatus', 'Controllers\Admin\TaxonomyController@updateStatus');
            Route::post('updateSort', 'Controllers\Admin\TaxonomyController@updateSort');
            Route::post('delete', 'Controllers\Admin\TaxonomyController@delete');
        });
    });
    Route::get('/', array('as' => 'dashboard', 'uses' => 'Controllers\Admin\DashboardController@index'));
});

// Route::controller('home', 'HomeController');
// Route::controller('admin', 'AdminController');

Route::get('/', function()
{
	return View::make('hello');
});