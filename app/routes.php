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
Route::any('uploadhandler', array('uses' => 'Libraries\UploadHandler@UploadHandler'));

Route::group(array('prefix' => 'admin'), function(){
    // 使用者
    Route::group(array('prefix' => 'users'), function(){
        Route::any('login', array('as' => 'user.login', 'uses' => 'Controllers\Admin\UsersController@login'));
        Route::any('logout', array('as' => 'user.logout', 'uses' => 'Controllers\Admin\UsersController@logout'));
    });
});

Route::group(array('prefix' => 'admin', 'before' => 'sentry'), function(){
    // 產品
    Route::group(array('prefix' => 'product'), function(){
        Route::post('updateStatus', 'Controllers\Admin\ProductController@updateStatus');
        Route::post('parseOldProd', 'Controllers\Admin\ProductController@parseOldProd');
        Route::get('getTabs/{prod_id}', 'Controllers\Admin\ProductController@getTabs');
        // 分類
        Route::group(array('prefix' => 'taxonomy'), function(){
            Route::any('index/{parent_id}', array('as' => 'sub_taxonomy', 'uses' => 'Controllers\Admin\TaxonomyController@index'));
            Route::any('index', array('as' => 'taxonomy', 'uses' => 'Controllers\Admin\TaxonomyController@index'));
            // Route::get('getItems/{parent_id?}', 'Controllers\Admin\TaxonomyController@getItems');
            // Route::post('edit', 'Controllers\Admin\TaxonomyController@edit');
            // Route::get('taxo_list', 'Controllers\Admin\TaxonomyController@taxo_list');
            Route::post('getTaxonomy', 'Controllers\Admin\TaxonomyController@getTaxonomy');
            Route::post('add_taxonomy', 'Controllers\Admin\TaxonomyController@add_taxonomy');
            Route::post('updateStatus', 'Controllers\Admin\TaxonomyController@updateStatus');
            Route::post('updateSort', 'Controllers\Admin\TaxonomyController@updateSort');
            Route::get('delete/{pk}', 'Controllers\Admin\TaxonomyController@delete');
        });
    });
    Route::resource('product', 'Controllers\Admin\ProductController');
    Route::resource('users', 'Controllers\Admin\UsersController');
    Route::get('/', array('as' => 'admin.index', 'uses' => 'Controllers\Admin\UsersController@login'));
});

// Route::controller('home', 'HomeController');
// Route::controller('admin', 'AdminController');

Route::get('/', array('as' => 'frontend.index', 'uses' => 'Controllers\HomeController@index'));
Route::get('/about', array('as' => 'frontend.about', 'uses' => 'Controllers\HomeController@about'));
Route::get('/about2', array('as' => 'frontend.about2', 'uses' => 'Controllers\HomeController@about2'));
Route::get('/about3', array('as' => 'frontend.about3', 'uses' => 'Controllers\HomeController@about3'));
Route::any('/contact', array('as' => 'frontend.contact', 'uses' => 'Controllers\HomeController@contact'));
Route::get('/support', array('as' => 'frontend.support', 'uses' => 'Controllers\HomeController@support'));
Route::get('/taxonomy/get_taxo2/{parent_id}', array('as' => 'frontend.get_taxo2', 'uses' => 'Controllers\TaxonomyController@get_taxo2'));

Route::group(array('prefix' => 'product'), function(){
    Route::get('/second/{taxo_2}', array('as' => 'frontend.products.second', 'uses' => 'Controllers\ProductController@second'));
    Route::any('/inquiry', array('as' => 'frontend.products.inquiry', 'uses' => 'Controllers\ProductController@inquiry'));
    Route::any('/search', array('as' => 'frontend.products.search', 'uses' => 'Controllers\ProductController@search'));
});
Route::resource('product', 'Controllers\ProductController', array('only' => array('index', 'show')));
