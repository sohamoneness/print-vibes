<?php

Route::group(['prefix' => 'artist'], function () {

    Route::get('login', 'Artist\LoginController@showLoginForm')->name('artist.login');
    Route::get('register', 'Artist\LoginController@showRegisterForm')->name('artist.register');
    Route::post('login', 'Artist\LoginController@login')->name('artist.login.post');
    Route::post('register', 'Artist\LoginController@register')->name('artist.register.post');
	Route::get('logout', 'Artist\LoginController@logout')->name('artist.logout');

	Route::group(['middleware' => ['auth:artist']], function () {

	    Route::get('/dashboard', function () {
	        return view('artist.dashboard');
	    })->name('artist.dashboard');

	    Route::group(['prefix'  =>   'design'], function() {
			Route::get('/', 'Artist\DesignController@index')->name('artist.design.index');
			Route::get('/create', 'Artist\DesignController@create')->name('artist.design.create');
			Route::post('/store', 'Artist\DesignController@store')->name('artist.design.store');
			Route::get('/{id}/edit', 'Artist\DesignController@edit')->name('artist.design.edit');
			Route::post('/update', 'Artist\DesignController@update')->name('artist.design.update');
			Route::get('/{id}/delete', 'Artist\DesignController@delete')->name('artist.design.delete');
			Route::post('updateStatus', 'Artist\DesignController@updateStatus')->name('artist.design.updateStatus');
			Route::get('/mail', 'Artist\DesignController@mail')->name('artist.design.mail');
		});

		Route::get('/orders', 'Artist\ArtistController@orders')->name('artist.orders');
		Route::get('/transactions', 'Artist\ArtistController@transactions')->name('artist.transactions');
		Route::get('/followers', 'Artist\ArtistController@followers')->name('artist.followers');
		Route::get('/notifications', 'Artist\ArtistController@notifications')->name('artist.notifications');
		Route::get('/my_account', 'Artist\ArtistController@my_account')->name('artist.my_account');
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