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
		Route::prefix('design')->group(function(){
			Route::get('', 'Admin\DesignController@index')->name('admin.design.index');
			Route::get('/create', 'Admin\DesignController@create')->name('admin.design.create');
			Route::post('/store', 'Admin\DesignController@store')->name('admin.design.store');
			Route::get('/{id}/edit', 'Admin\DesignController@edit')->name('admin.design.edit');
			Route::post('/update', 'Admin\DesignController@update')->name('admin.design.update');
			Route::post('/updateStatus', 'Admin\DesignController@updateStatus')->name('admin.design.updateStatus');
			Route::get('/{id}/delete', 'Admin\DesignController@delete')->name('admin.design.delete');
		});

		Route::prefix('category')->group(function(){
			Route::get('', 'Admin\CategoryController@index')->name('admin.category.index');
			Route::get('/create', 'Admin\CategoryController@create')->name('admin.category.create');
			Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
			Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
			Route::post('/update', 'Admin\CategoryController@update')->name('admin.category.update');
			Route::post('/updateStatus', 'Admin\CategoryController@updateStatus')->name('admin.category.updateStatus');
			Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.category.delete');
		});
		Route::prefix('product')->group(function(){
			Route::get('', 'Admin\ProductController@index')->name('admin.product.index');
			Route::get('/create', 'Admin\ProductController@create')->name('admin.product.create');
			Route::post('/store', 'Admin\ProductController@store')->name('admin.product.store');
			Route::get('/{id}/edit', 'Admin\ProductController@edit')->name('admin.product.edit');
			Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update');
			Route::post('/updateStatus', 'Admin\ProductController@updateStatus')->name('admin.product.updateStatus');
			Route::get('/{id}/delete', 'Admin\ProductController@delete')->name('admin.product.delete');
		});
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
