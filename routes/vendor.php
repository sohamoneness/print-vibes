<?php

Route::group(['prefix' => 'vendor'], function () {

    Route::get('login', 'Vendor\LoginController@showLoginForm')->name('vendor.login');
    Route::get('register', 'Vendor\LoginController@showRegisterForm')->name('vendor.register');
    Route::post('login', 'Vendor\LoginController@login')->name('vendor.login.post');
    Route::post('register', 'Vendor\LoginController@register')->name('vendor.register.post');
	Route::get('logout', 'Vendor\LoginController@logout')->name('vendor.logout');

	Route::group(['middleware' => ['auth:vendor']], function () {

	    Route::get('/dashboard', function () {
	        return view('vendor.dashboard');
	    })->name('vendor.dashboard');

		Route::get('/notifications', 'Vendor\VendorController@notifications')->name('vendor.notifications');
		Route::get('/my_account', 'Vendor\VendorController@my_account')->name('vendor.my_account');
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