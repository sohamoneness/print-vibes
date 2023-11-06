<?php

Route::prefix('admin')->group(function(){
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
	Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
	
	//admin password reset routes

	Route::group(['middleware' => ['auth:admin']], function () {

	    Route::get('/', function () {
	        return view('admin.dashboard.index');
	    })->name('admin.dashboard');

	});

	Route::get('clear-cache', function () { 
		\Artisan::call("cache:clear"); 
		
	}); 
	Route::get('route-cache', function () { 
		\Artisan::call("route:clear");  
	});

	Route::get('config-cache', function () { 
		\Artisan::call("config:clear");  
	});
	
});


?>