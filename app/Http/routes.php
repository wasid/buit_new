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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'admin'], function(){
    
    Route::resource('/user/posts', 'UserPostController');
    
    Route::resource('/admin', 'AdminUsersController');
    
    
});

Route::group(['middleware' => 'auth'], function(){
    
        Route::get('/user/filter/{lab_name?}',[ 
            
            'uses' => 'UserPostController@filter',
            'as' => 'filter'
        ]);
        
        Route::post('/user/search',[ 
            
            'uses' => 'UserPostController@search',
            'as' => 'search'
        ]);
        
        Route::get('/user/posts',[ 
            
            'uses' => 'UserPostController@index',
            'as' => 'user.posts.index'
        ]);
        
        Route::post('/user/posts',[ 
            
            'uses' => 'UserPostController@store',
            'as' => 'user.posts.index'
        ]);
        
        Route::get('/user/posts/{posts}',[ 
            
            'uses' => 'UserPostController@show',
            'as' => 'user.posts.show'
        ]);
        Route::delete('/user/posts/{posts}',[ 
            
            'uses' => 'UserPostController@destroy',
            'as' => 'user.posts.destroy'
        ]);
        Route::patch('/user/posts/{posts}',[ 
            
            'uses' => 'UserPostController@update',
            'as' => 'user.posts.update'
        ]);
        
        Route::get('/users',[ 
            
            'uses' => 'UserPostController@getLab',
            'as' => 'getlab'
        ]);

        Route::get('/student', [
            'uses' => 'StudentController@getStudent',
            'as' => 'getstudent'
        ]);
        
        Route::post('/showstudent', [
            'uses' => 'StudentController@showStudent',
            'as' => 'showstudent'
        ]); 
        
        Route::get('/changepassword', [
            'uses' => 'UserPostController@changePassword',
            'as' => 'changepassword'
        ]);
        
        Route::post('/newpassword', [
            'uses' => 'UserPostController@newPassword',
            'as' => 'newpassword'
        ]);
        
        Route::post('/searchall', [
            'uses' => 'UserPostController@searchAll',
            'as' => 'searchall'
        ]);
        
});
