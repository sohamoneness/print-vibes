<?php

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
	Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
	
	//admin password reset routes
    Route::post('/password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register')->middleware('hasInvitation');
	Route::post('/register', 'Admin\RegisterController@register')->name('admin.register.post');
	Route::get('/calculate-incentive', 'Admin\DeliveryBoyManagementController@calculateIncentive')->name('admin.boys.calculateIncentive');
    Route::group(['middleware' => ['auth:admin']], function () {

	    Route::get('/', function () {
	        return view('admin.dashboard.index');
	    })->name('admin.dashboard');

		Route::get('/invite_list', 'Admin\InvitationController@index')->name('admin.invite');
	    Route::get('/invitation', 'Admin\InvitationController@create')->name('admin.invite.create');
	    Route::post('/invitation', 'Admin\InvitationController@store')->name('admin.invitation.store');
		Route::get('/adminuser', 'Admin\AdminUserController@index')->name('admin.adminuser');
		Route::post('/adminuser', 'Admin\AdminUserController@updateAdminUser')->name('admin.adminuser.update');
	    Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
		Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');
		Route::post('/setabUpdatettings', 'Admin\SettingController@tabUpdate')->name('admin.settings.tabUpdate');
		
		Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
		Route::post('/profile', 'Admin\ProfileController@update')->name('admin.profile.update');
		Route::post('/changepassword', 'Admin\ProfileController@changePassword')->name('admin.profile.changepassword');

		Route::group(['prefix'  =>   'banner'], function() {
			Route::get('/', 'Admin\BannerController@index')->name('admin.banner.index');
			Route::get('/create', 'Admin\BannerController@create')->name('admin.banner.create');
			Route::post('/store', 'Admin\BannerController@store')->name('admin.banner.store');
			Route::get('/{id}/edit', 'Admin\BannerController@edit')->name('admin.banner.edit');
			Route::post('/update', 'Admin\BannerController@update')->name('admin.banner.update');
			Route::get('/{id}/delete', 'Admin\BannerController@delete')->name('admin.banner.delete');
			Route::post('updateStatus', 'Admin\BannerController@updateStatus')->name('admin.banner.updateStatus');
			Route::post('/bulkStatus', 'Admin\BannerController@bulkStatus')->name('admin.banner.bulkStatus');
		});

		
		Route::group(['prefix'  =>   'users'], function() {
			Route::get('/', 'Admin\UserManagementController@index')->name('admin.users.index');
			Route::post('/', 'Admin\UserManagementController@updateUser')->name('admin.users.post');
			Route::get('/create', 'Admin\UserManagementController@create')->name('admin.users.create');
			Route::post('/store', 'Admin\UserManagementController@store')->name('admin.users.store');
			Route::get('/{id}/delete', 'Admin\UserManagementController@delete')->name('admin.users.delete');
			Route::get('/{id}/edit', 'Admin\UserManagementController@edit')->name('admin.users.edit');
			Route::post('/update', 'Admin\UserManagementController@update')->name('admin.users.update');
			Route::post('updateStatus', 'Admin\UserManagementController@updateStatus')->name('admin.users.updateStatus');
			Route::get('/{id}/details', 'Admin\UserManagementController@details')->name('admin.users.details');
			Route::get('/{id}/orders', 'Admin\UserManagementController@orders')->name('admin.users.orders');
			Route::get('/{id}/wallets', 'Admin\UserManagementController@wallets')->name('admin.users.wallets');
			Route::get('/{id}/reviews', 'Admin\UserManagementController@reviews')->name('admin.users.reviews');
			Route::get('/{id}/createorder', 'Admin\UserManagementController@createOrder')->name('admin.users.createOrder');
			Route::post('addUserCart', 'Admin\UserManagementController@addUserCart')->name('admin.users.addUserCart');
			Route::get('/{id}/usercart/{restaurantId}', 'Admin\UserManagementController@userCart')->name('admin.users.userCart');
			Route::post('updateUserCart', 'Admin\UserManagementController@updateUserCart')->name('admin.users.updateUserCart');
			Route::post('createUserOrder', 'Admin\UserManagementController@createUserOrder')->name('admin.users.createUserOrder');
			Route::post('/csv-store', 'Admin\UserManagementController@csvStore')->name('admin.users.data.csv.store');
            Route::get('/export', 'Admin\UserManagementController@export')->name('admin.users.data.csv.export');
            Route::get('/verified-user/{id}', 'Admin\UserManagementController@VerifiedUser')->name('admin.users.verified-user');
		});
		
		// Route::group(['prefix'  =>   'business'], function() {
		// 	Route::get('/', 'Admin\BusinessController@index')->name('admin.business.index');
		// 	Route::get('/create', 'Admin\BusinessController@create')->name('admin.business.create');
		// 	Route::post('/store', 'Admin\BusinessController@store')->name('admin.business.store');
		// 	Route::get('/{id}/edit', 'Admin\BusinessController@edit')->name('admin.business.edit');
		// 	Route::post('/update', 'Admin\BusinessController@update')->name('admin.business.update');
		// 	Route::get('/{id}/delete', 'Admin\BusinessController@delete')->name('admin.business.delete');
		// 	Route::post('updateStatus', 'Admin\BusinessController@updateStatus')->name('admin.business.updateStatus');
		// 	Route::get('/{id}/details', 'Admin\BusinessController@details')->name('admin.business.details');
		// });

		Route::group(['prefix'  =>   'main-category'], function() {
			Route::get('/', 'Admin\CategoryController@mainIndex')->name('admin.main-category.index');
			Route::get('/create', 'Admin\CategoryController@mainCreate')->name('admin.main-category.create');
			Route::post('/store', 'Admin\CategoryController@mainStore')->name('admin.main-category.store');
			Route::get('/{id}/edit', 'Admin\CategoryController@mainEdit')->name('admin.main-category.edit');
			Route::post('/update', 'Admin\CategoryController@mainUpdate')->name('admin.main-category.update');
			Route::get('/{id}/delete', 'Admin\CategoryController@mainDelete')->name('admin.main-category.delete');
			Route::post('updateStatus', 'Admin\CategoryController@mainUpdateStatus')->name('admin.main-category.updateStatus');
		});
		Route::group(['prefix'  =>   'category'], function() {
			Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');
			Route::get('/list', 'Admin\CategoryController@list')->name('admin.category.list');
			Route::get('/create', 'Admin\CategoryController@create')->name('admin.category.create');
			Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
			Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
			Route::post('/update', 'Admin\CategoryController@update')->name('admin.category.update');
			Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.category.delete');
			Route::post('updateStatus', 'Admin\CategoryController@updateStatus')->name('admin.category.updateStatus');
			Route::get('/{id}/details', 'Admin\CategoryController@details')->name('admin.category.details');
		});

		Route::group(['prefix'  =>   'blog'], function() {
			Route::get('/', 'Admin\BlogController@index')->name('admin.blog.index');
			Route::get('/create', 'Admin\BlogController@create')->name('admin.blog.create');
			Route::post('/store', 'Admin\BlogController@store')->name('admin.blog.store');
			Route::get('/{id}/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
			Route::post('/update', 'Admin\BlogController@update')->name('admin.blog.update');
			Route::get('/{id}/delete', 'Admin\BlogController@delete')->name('admin.blog.delete');
			Route::post('updateStatus', 'Admin\BlogController@updateStatus')->name('admin.blog.updateStatus');
			Route::get('/{id}/details', 'Admin\BlogController@details')->name('admin.blog.details');
		});

		Route::group(['prefix'  =>   'notification'], function() {
			Route::get('/', 'Admin\NotificationController@datasetNotificationList')->name('admin.notification.datasetNotification'); 
			Route::get('/userNotification', 'Admin\NotificationController@index')->name('admin.notification.userNotification'); 
			Route::get('/create', 'Admin\NotificationController@create')->name('admin.notification.create');
			Route::post('/store', 'Admin\NotificationController@store')->name('admin.notification.store');
			Route::get('/{id}/delete', 'Admin\NotificationController@delete')->name('admin.notification.delete');
			Route::get('/sos', 'Admin\NotificationController@sos')->name('admin.notification.sos');
			Route::get('/createDataset', 'Admin\NotificationController@createDataset')->name('admin.notification.createDataset');
			Route::post('/DatasetStore', 'Admin\NotificationController@DatasetStore')->name('admin.notification.DatasetStore');
			Route::get('/DatasetExport/{id}', 'Admin\NotificationController@DatasetExport')->name('admin.notification.DatasetExport');
			Route::post('/csvDataSetStore', 'Admin\NotificationController@csvDataSetStore')->name('admin.notification.csvDataSetStore');
			Route::post('/ajaxRestroCategories', 'Admin\NotificationController@ajaxCategoriesByRestroId')->name('admin.notification.ajaxRestroCategories');
		});
		Route::POST('/customer/list', 'Admin\NotificationController@CustomerFetch')->name('admin.customer.fetch');
		Route::get('/customer/data-set-list/{id}', 'Admin\NotificationController@CustomerDataSetList')->name('admin.customer.data-set-list');
		
		Route::group(['prefix'  =>   'cousine'], function() {
			Route::get('/', 'Admin\CousineController@index')->name('admin.cousine.index');
			Route::get('/create', 'Admin\CousineController@create')->name('admin.cousine.create');
			Route::post('/store', 'Admin\CousineController@store')->name('admin.cousine.store');
			Route::get('/{id}/edit', 'Admin\CousineController@edit')->name('admin.cousine.edit');
			Route::post('/update', 'Admin\CousineController@update')->name('admin.cousine.update');
			Route::get('/{id}/delete', 'Admin\CousineController@delete')->name('admin.cousine.delete');
			Route::post('updateStatus', 'Admin\CousineController@updateStatus')->name('admin.cousine.updateStatus');
			Route::get('/{id}/details', 'Admin\CousineController@details')->name('admin.cousine.details');
			Route::post('/bulkStatus', 'Admin\CousineController@bulkStatus')->name('admin.cousine.bulkStatus');
		});

		Route::group(['prefix'  =>   'cousine'], function() {
			Route::get('/', 'Admin\CousineController@index')->name('admin.cousine.index');
			Route::get('/create', 'Admin\CousineController@create')->name('admin.cousine.create');
			Route::post('/store', 'Admin\CousineController@store')->name('admin.cousine.store');
			Route::get('/{id}/edit', 'Admin\CousineController@edit')->name('admin.cousine.edit');
			Route::post('/update', 'Admin\CousineController@update')->name('admin.cousine.update');
			Route::get('/{id}/delete', 'Admin\CousineController@delete')->name('admin.cousine.delete');
			Route::post('updateStatus', 'Admin\CousineController@updateStatus')->name('admin.cousine.updateStatus');
			Route::get('/{id}/details', 'Admin\CousineController@details')->name('admin.cousine.details');
		});

		Route::group(['prefix'  =>   'location'], function() {
			Route::get('/', 'Admin\LocationController@index')->name('admin.location.index');
			Route::get('/create', 'Admin\LocationController@create')->name('admin.location.create');
			Route::post('/store', 'Admin\LocationController@store')->name('admin.location.store');
			Route::get('/{id}/edit', 'Admin\LocationController@edit')->name('admin.location.edit');
			Route::post('/update', 'Admin\LocationController@update')->name('admin.location.update');
			Route::get('/{id}/delete', 'Admin\LocationController@delete')->name('admin.location.delete');
			Route::post('updateStatus', 'Admin\LocationController@updateStatus')->name('admin.location.updateStatus');
			Route::get('/{id}/details', 'Admin\LocationController@details')->name('admin.location.details');
		});

		Route::group(['prefix'  =>   'commission'], function() {
			Route::get('/', 'Admin\CommissionController@index')->name('admin.commission.index');
			Route::get('/create', 'Admin\CommissionController@create')->name('admin.commission.create');
			Route::post('/store', 'Admin\CommissionController@store')->name('admin.commission.store');
			Route::get('/{id}/edit', 'Admin\CommissionController@edit')->name('admin.commission.edit');
			Route::post('/update', 'Admin\CommissionController@update')->name('admin.commission.update');
			Route::get('/{id}/delete', 'Admin\CommissionController@delete')->name('admin.commission.delete');
			Route::post('updateStatus', 'Admin\CommissionController@updateStatus')->name('admin.commission.updateStatus');
			Route::get('/{id}/details', 'Admin\CommissionController@details')->name('admin.commission.details');
		});

		Route::group(['prefix'  =>   'incentive'], function() {
			Route::get('/', 'Admin\IncentiveController@index')->name('admin.incentive.index');
			Route::get('/slab-list/{id}', 'Admin\IncentiveController@SlabList')->name('admin.incentive.slab-list');
			Route::get('/create', 'Admin\IncentiveController@create')->name('admin.incentive.create');
			Route::get('/multiple', 'Admin\IncentiveController@multiple')->name('admin.incentive.multiple');
			Route::post('/store', 'Admin\IncentiveController@store')->name('admin.incentive.store');
			Route::post('/multiStore', 'Admin\IncentiveController@MultiStore')->name('admin.incentive.multiStore');
			Route::get('/{id}/edit', 'Admin\IncentiveController@edit')->name('admin.incentive.edit');
			Route::post('/update', 'Admin\IncentiveController@update')->name('admin.incentive.update');
			Route::get('/{id}/delete', 'Admin\IncentiveController@delete')->name('admin.incentive.delete');
			Route::post('updateStatus', 'Admin\IncentiveController@updateStatus')->name('admin.incentive.updateStatus');
			Route::get('/{id}/details', 'Admin\IncentiveController@details')->name('admin.incentive.details');
		});

		Route::group(['prefix'  =>   'vehicle'], function() {
			Route::get('/', 'Admin\VehicleController@index')->name('admin.vehicle.index');
			Route::get('/create', 'Admin\VehicleController@create')->name('admin.vehicle.create');
			Route::post('/store', 'Admin\VehicleController@store')->name('admin.vehicle.store');
			Route::get('/{id}/edit', 'Admin\VehicleController@edit')->name('admin.vehicle.edit');
			Route::post('/update', 'Admin\VehicleController@update')->name('admin.vehicle.update');
			Route::get('/{id}/delete', 'Admin\VehicleController@delete')->name('admin.vehicle.delete');
			Route::post('updateStatus', 'Admin\VehicleController@updateStatus')->name('admin.vehicle.updateStatus');
			Route::get('/{id}/details', 'Admin\VehicleController@details')->name('admin.vehicle.details');
		});
		//universal charge config
		Route::group(['prefix'  =>   'delivery/charge/config'], function() {
			Route::get('/', 'Admin\DeliveryChargeConfigController@index')->name('admin.delivery-charge-config.index');
			Route::get('/create', 'Admin\DeliveryChargeConfigController@create')->name('admin.delivery-charge-config.create');
			Route::get('/multiple', 'Admin\DeliveryChargeConfigController@multiple')->name('admin.delivery-charge-config.multiple');
			Route::post('/multipleStore', 'Admin\DeliveryChargeConfigController@multipleStore')->name('admin.delivery-charge-config.multipleStore');
			Route::post('/store', 'Admin\DeliveryChargeConfigController@store')->name('admin.delivery-charge-config.store');
			Route::get('/{id}/edit', 'Admin\DeliveryChargeConfigController@edit')->name('admin.delivery-charge-config.edit');
			Route::get('/{id}/slub-view', 'Admin\DeliveryChargeConfigController@SlubView')->name('admin.delivery-charge-config.slub-view');
			Route::post('/update', 'Admin\DeliveryChargeConfigController@update')->name('admin.delivery-charge-config.update');
			Route::get('/{id}/delete', 'Admin\DeliveryChargeConfigController@delete')->name('admin.delivery-charge-config.delete');
			Route::post('updateStatus', 'Admin\DeliveryChargeConfigController@updateStatus')->name('admin.delivery-charge-config.updateStatus');
			Route::get('/{id}/details', 'Admin\DeliveryChargeConfigController@details')->name('admin.delivery-charge-config.details');
		});
		//delivery boy charge config
		Route::group(['prefix'  =>   'delivery/boy/charge/config'], function() {
			Route::get('/', 'Admin\DeliveryBoyChargeConfigController@index')->name('admin.delivery-boy-charge-config.index');
			Route::get('/create', 'Admin\DeliveryBoyChargeConfigController@create')->name('admin.delivery-boy-charge-config.create');
			Route::get('/{id}/slub-view', 'Admin\DeliveryBoyChargeConfigController@SlubView')->name('admin.delivery-boy-charge-config.slub-view');
			Route::get('/multiple', 'Admin\DeliveryBoyChargeConfigController@multiple')->name('admin.delivery-boy-charge-config.multiple');
			Route::post('/multipleStore', 'Admin\DeliveryBoyChargeConfigController@multipleStore')->name('admin.delivery-boy-charge-config.multipleStore');
			Route::post('/DeliveryChargeStore', 'Admin\DeliveryBoyChargeConfigController@DeliveryChargeStore')->name('admin.delivery-boy-charge-config.DeliveryChargeStore');
			Route::post('/DeliveryChargeUpdate', 'Admin\DeliveryBoyChargeConfigController@DeliveryChargeUpdate')->name('admin.delivery-boy-charge-config.DeliveryChargeUpdate');
			Route::post('/store', 'Admin\DeliveryBoyChargeConfigController@store')->name('admin.delivery-boy-charge-config.store');
			Route::get('/{id}/edit', 'Admin\DeliveryBoyChargeConfigController@edit')->name('admin.delivery-boy-charge-config.edit');
			Route::post('/update', 'Admin\DeliveryBoyChargeConfigController@update')->name('admin.delivery-boy-charge-config.update');
			Route::get('/{id}/delete', 'Admin\DeliveryBoyChargeConfigController@delete')->name('admin.delivery-boy-charge-config.delete');
			Route::post('updateStatus', 'Admin\DeliveryBoyChargeConfigController@updateStatus')->name('admin.delivery-boy-charge-config.updateStatus');
			Route::get('/{id}/details', 'Admin\DeliveryBoyChargeConfigController@details')->name('admin.delivery-boy-charge-config.details');
		});
		Route::group(['prefix'  =>   'boys'], function() {
			Route::get('/', 'Admin\DeliveryBoyController@index')->name('admin.boys.index');
			Route::get('/create', 'Admin\DeliveryBoyController@create')->name('admin.boys.create');
			Route::post('/store', 'Admin\DeliveryBoyController@store')->name('admin.boys.store');
			Route::get('/{id}/edit', 'Admin\DeliveryBoyController@edit')->name('admin.boys.edit');
			Route::post('/update', 'Admin\DeliveryBoyController@update')->name('admin.boys.update');
			Route::get('/{id}/delete', 'Admin\DeliveryBoyController@delete')->name('admin.boys.delete');
			Route::post('updateStatus', 'Admin\DeliveryBoyController@updateStatus')->name('admin.boys.updateStatus');
			Route::get('/{id}/details', 'Admin\DeliveryBoyController@details')->name('admin.boys.details');
			Route::get('/driver/location', 'Admin\DeliveryBoyManagementController@showLivelocations')->name('admin.driver.livelocation.index');
			Route::get('/{id}/order', 'Admin\DeliveryBoyManagementController@order')->name('admin.boys.orders');
			Route::get('/{id}/earnings', 'Admin\DeliveryBoyManagementController@earnings')->name('admin.boys.earnings');
			Route::get('/calculate-incentive', 'Admin\DeliveryBoyManagementController@calculateIncentive')->name('admin.boys.calculateIncentive');
			Route::get('team/boy/{team}', 'Admin\TeamController@teamDetail')->name('admin.boys.teamDetails');
			Route::get('/{id}/attendance', 'Admin\DeliveryBoyManagementController@attendance')->name('admin.boys.attendance');
			Route::get('/{id}/total_income', 'Admin\DeliveryBoyManagementController@total_income')->name('admin.boys.total_income');
			Route::get('/total-earning', 'Admin\DeliveryBoyController@TotalEarning')->name('admin.boys.total-earning');
			Route::get('/delivery-cod-collections', 'Admin\DeliveryBoyController@DeliveryBoyCoDList')->name('admin.boys.delivery-cod-collections');
			Route::get('/export-cod-collections', 'Admin\DeliveryBoyController@CoDListExport')->name('admin.boys.export-cod-collections');
			Route::get('/total-earning-export', 'Admin\DeliveryBoyController@TotalEarningExport')->name('admin.boys.total-earning-export');
			Route::get('/{id}/change_password', 'Admin\DeliveryBoyController@change_password')->name('admin.boys.change_password');
			Route::post('/updatePassword', 'Admin\DeliveryBoyController@updatePassword')->name('admin.boys.updatepassword');
			Route::get('/rider-payment', 'Admin\DeliveryBoyController@RiderPayment')->name('admin.boy.payment-list');
			Route::get('/rider-payment-create', 'Admin\DeliveryBoyController@RiderPaymentCreate')->name('admin.boy.payment-create');
			Route::post('/rider-payment-store', 'Admin\DeliveryBoyController@RiderPaymentStore')->name('admin.boy.payment-store');
			Route::post('/rider-pending-payment', 'Admin\DeliveryBoyController@RiderPendingPayment')->name('admin.boy.pending-payment');
			Route::get('/rider-payment-export', 'Admin\DeliveryBoyController@RiderPaymentExport')->name('admin.boys.rider-payment-export');
			Route::post('/bulkStatus', 'Admin\DeliveryBoyController@bulkStatus')->name('admin.boys.bulkStatus');
		});
		Route::group(['prefix'  =>   'team/management'], function() {
			Route::get('/', 'Admin\TeamController@index')->name('admin.team.index');
			Route::get('/create', 'Admin\TeamController@create')->name('admin.team.create');
			Route::post('/store', 'Admin\TeamController@store')->name('admin.team.store');
			Route::get('/{id}/edit', 'Admin\TeamController@edit')->name('admin.team.edit');
			Route::post('/update', 'Admin\TeamController@update')->name('admin.team.update');
			Route::get('/{id}/delete', 'Admin\TeamController@delete')->name('admin.team.delete');
			Route::post('updateStatus', 'Admin\TeamController@updateStatus')->name('admin.team.updateStatus');
			Route::get('/{id}/details', 'Admin\TeamController@details')->name('admin.team.details');
			
		});

		Route::group(['prefix'  =>   'restaurant'], function() {
			Route::get('/', 'Admin\RestaurantController@index')->name('admin.restaurant.index');
			Route::get('/create', 'Admin\RestaurantController@create')->name('admin.restaurant.create');
			Route::post('/store', 'Admin\RestaurantController@store')->name('admin.restaurant.store');
			Route::get('/{id}/edit', 'Admin\RestaurantController@edit')->name('admin.restaurant.edit');
			Route::post('/update', 'Admin\RestaurantController@update')->name('admin.restaurant.update');
			Route::get('/{id}/delete', 'Admin\RestaurantController@delete')->name('admin.restaurant.delete');
			Route::post('updateStatus', 'Admin\RestaurantController@updateStatus')->name('admin.restaurant.updateStatus');
			Route::get('/{id}/details', 'Admin\RestaurantController@details')->name('admin.restaurant.details');
			Route::get('/{id}/items', 'Admin\RestaurantController@items')->name('admin.restaurant.items');
			Route::get('/{id}/addon-items', 'Admin\RestaurantController@addonIems')->name('admin.restaurant.addon-items');
			Route::get('/{id}/itemAllStock', 'Admin\RestaurantController@itemAllStock')->name('admin.restaurant.itemAllStock');
			Route::get('/{id}/item/position', 'Admin\RestaurantController@itemsposition')->name('admin.restaurant.itemsposition');
			Route::post('/item/position/update', 'Admin\RestaurantController@itemspositionupdate')->name('admin.restaurant.itemsposition.update');
			Route::get('/{id}/item/create', 'Admin\RestaurantController@itemcreate')->name('admin.restaurant.itemcreate');
			Route::get('/{id}/items/edit', 'Admin\RestaurantController@itemedit')->name('admin.restaurant.itemedit');
			Route::get('/{id}/restaurant/{itemId}/itemdelete', 'Admin\RestaurantController@itemdelete')->name('admin.restaurant.itemdelete');
			Route::post('updateItemStatus', 'Admin\RestaurantController@updateItemStatus')->name('admin.restaurant.updateItemStatus');
			Route::post('updateItemStock', 'Admin\RestaurantController@updateItemStock')->name('admin.restaurant.updateItemStock');
			Route::post('/itemstore', 'Admin\RestaurantController@itemstore')->name('admin.restaurant.itemstore');
			Route::post('/itemupdate', 'Admin\RestaurantController@itemupdate')->name('admin.restaurant.itemupdate');
			Route::post('/item/csv-store', 'Admin\RestaurantController@itemcsvStore')->name('admin.restaurant.items.data.csv.store');
            Route::get('/item/export', 'Admin\RestaurantController@itemexport')->name('admin.restaurant.items.data.csv.export');
			Route::get('/{id}/transactions', 'Admin\RestaurantController@transactions')->name('admin.restaurant.transactions');
			Route::get('/{id}/orders', 'Admin\RestaurantController@orders')->name('admin.restaurant.orders');
			Route::get('/{id}/reviews', 'Admin\RestaurantController@reviews')->name('admin.restaurant.reviews');
			Route::get('/{id}/change_password', 'Admin\RestaurantController@change_password')->name('admin.restaurant.change_password');
			Route::post('/updatePassword', 'Admin\RestaurantController@updatePassword')->name('admin.restaurant.updatepassword');
			Route::get('/{id}/offers', 'Admin\RestaurantController@offers')->name('admin.restaurant.offers');
			Route::get('/{id}/offerdit', 'Admin\RestaurantController@offeredit')->name('admin.restaurant.offerdit');
			Route::post('offerUpdateStatus', 'Admin\RestaurantController@updateOfferStatus')->name('admin.restaurant.offerUpdateStatus');
			Route::post('updateOffer', 'Admin\RestaurantController@updateOffer')->name('admin.restaurant.updateOffer');
			Route::get('/{id}/offerdelete/{itemId}', 'Admin\RestaurantController@offerdelete')->name('admin.restaurant.offerdelete');
			Route::get('/{id}/offercreate', 'Admin\RestaurantController@offerCreate')->name('admin.restaurant.offercreate');
			Route::post('/submitOffer', 'Admin\RestaurantController@submitOffer')->name('admin.restaurant.submitOffer');
			Route::post('/csv-store', 'Admin\RestaurantController@csvStore')->name('admin.restaurant.data.csv.store');
			
            Route::get('/export', 'Admin\RestaurantController@export')->name('admin.restaurant.data.csv.export');
            Route::post('/bulkStatus', 'Admin\RestaurantController@bulkStatus')->name('admin.restaurant.bulkStatus');
          
		});

	    // Offers & Coupons
		Route::get('/offers', 'Admin\OfferNCouponController@index')->name('admin.offers.index');  
        Route::get('/offers/create', 'Admin\OfferNCouponController@create')->name('admin.offers.create');  
		Route::post('/storeOffer', 'Admin\OfferNCouponController@store')->name('admin.offers.store'); 
		Route::get('/{id}/offerEdit', 'Admin\OfferNCouponController@offerEdit')->name('admin.offer.edit');
		Route::post('/ajaxItems', 'Admin\OfferNCouponController@ajaxItems')->name('admin.offers.ajaxItems'); 
		Route::post('/updateOffer', 'Admin\OfferNCouponController@update')->name('admin.offers.update'); 
		Route::post('/updateStatus', 'Admin\OfferNCouponController@updateStatus')->name('admin.offers.updateStatus'); 
		Route::get('/offer/{id}/delete', 'Admin\OfferNCouponController@OfferDelete')->name('admin.offers.delete'); 
		
		Route::post('/ajaxCategories', 'Admin\OfferNCouponController@ajaxCategoriesByRestroId')->name('admin.offers.ajaxRestroCategories');


		Route::group(['prefix'  =>   'order'], function() {
			Route::get('/', 'Admin\OrderController@index')->name('admin.order.index');
			Route::get('/{id}/details', 'Admin\OrderController@details')->name('admin.order.details');
			Route::get('/new', 'Admin\OrderController@new')->name('admin.order.new');
			Route::get('/distance/{id}', 'Admin\OrderController@distance')->name('admin.order.distance');
			Route::get('/agentRider/', 'Admin\OrderController@agentRider')->name('admin.order.agentRider');
			Route::get('/agentRider/{id}/', 'Admin\OrderController@agentRider')->name('admin.order.agentRider');
			Route::get('/restaurantForceAccept/{id}/', 'Admin\OrderController@restaurantForceAccept')->name('admin.order.restaurantForceAccept');
			Route::get('/new/order/export', 'Admin\OrderController@newexport')->name('admin.new.order.data.csv.export');
			Route::get('/ongoing', 'Admin\OrderController@ongoing')->name('admin.order.ongoing');
			Route::get('/AutoStatusUpdate', 'Admin\OrderController@AutoStatusUpdate')->name('admin.order.AutoStatusUpdate');
			Route::get('/ongoing/order/export', 'Admin\OrderController@ongoingexport')->name('admin.ongoing.order.data.csv.export');
			Route::get('/delivered', 'Admin\OrderController@delivered')->name('admin.order.delivered');
			Route::get('/delivered/order/export', 'Admin\OrderController@deliveredexport')->name('admin.delivered.order.data.csv.export');
			Route::get('/cancelled', 'Admin\OrderController@cancelled')->name('admin.order.cancelled');
			Route::get('/cancelled/order/export', 'Admin\OrderController@cancelledexport')->name('admin.cancelled.order.data.csv.export');
			Route::post('/assignboy', 'Admin\OrderController@assignDeliveryBoy')->name('admin.order.assignboy');
			Route::get('/sales', 'Admin\OrderController@salesReport')->name('admin.order.sales');
			Route::get('/sales/export', 'Admin\OrderController@salesReportexport')->name('admin.order.sales.data.csv.export');
			Route::get('/online-transactions', 'Admin\OrderController@onlineTransactions')->name('admin.order.onlinetransactions');
			Route::get('/online-transactions/export', 'Admin\OrderController@onlineTransactionsexport')->name('admin.order.onlinetransactions.data.csv.export');
			Route::get('/report', 'Admin\OrderController@report')->name('admin.order.report');
			Route::get('/{id}/report-details', 'Admin\OrderController@report_details')->name('admin.order.report_details');
			Route::get('/report/export', 'Admin\OrderController@reportexport')->name('admin.order.report.data.csv.export');
			
            Route::get('/export', 'Admin\OrderController@export')->name('admin.order.data.csv.export');
			Route::post('/refund/wallet', 'Admin\OrderController@refundWallet')->name('admin.order.refundWallet');
			Route::post('/refund/razorpay', 'Admin\OrderController@refundRazorPay')->name('admin.order.refundRazorPay');

			Route::post('/cancelCharge', 'Admin\OrderController@cancelCharge')->name('admin.order.cancelCharge');
			Route::post('/updateDeliveryCharge', 'Admin\OrderController@updateDeliveryCharge')->name('admin.order.updateDeliveryCharge');
			


			Route::get('/pdf/{id}', 'Admin\OrderController@orderPdf')->name('admin.order.pdf');
			
			//offline order
		 
			Route::get('/offline', 'Admin\OfflineOrderController@create')->name('admin.order.offline');
			Route::get('/offlineCustomer/{id}', 'Admin\OfflineOrderController@offlineCustomer')->name('admin.order.offlineCustomer');
			Route::any('/offline/searchUser', 'Admin\OfflineOrderController@searchUser')->name('admin.order.offline.searchuser'); 
			Route::post('/createorder', 'Admin\OfflineOrderController@store')->name('admin.offline.users.store');
			Route::post('/fetch', 'Admin\OfflineOrderController@fetch')->name('admin.offline.users.fetch');
			Route::post('/nameStore', 'Admin\OfflineOrderController@nameStore')->name('admin.offline.users.nameStore');
			Route::post('/EmailStore', 'Admin\OfflineOrderController@EmailStore')->name('admin.offline.users.EmailStore');
			Route::post('/offline-restaurant-taken-order', 'Admin\OfflineOrderController@restaurantTakenOrder')->name('admin.offline.users.restaurant-check');
			Route::get('/deleteCartItem/{cartId}', 'Admin\OfflineOrderController@deleteCartItem')->name('admin.order.deleteCartItem');
			Route::post('/customerUpdate/{id}', 'Admin\OfflineOrderController@customerUpdate')->name('admin.offline.users.update');
			Route::get('/offline/create/{id}', 'Admin\OfflineOrderController@createOrder')->name('admin.offline.users.order.create');
			Route::post('offline/addUserCart', 'Admin\OfflineOrderController@addUserCart')->name('admin.offline.users.addUserCart');
			Route::get('offline/{id}/usercart/{restaurantId}', 'Admin\OfflineOrderController@userCart')->name('admin.offline.users.userCart');
			Route::post('offline/updateUserCart', 'Admin\OfflineOrderController@updateUserCart')->name('admin.offline.users.updateUserCart');
			Route::post('offline/createUserOrder', 'Admin\OfflineOrderController@createofflineUserOrder')->name('admin.offline.users.createUserOrder');
			Route::post('/updateOrderItem', 'Admin\OrderController@updateOrderItem')->name('admin.order.updateOrderItem');
			Route::post('/updateOrderAddOnItem1', 'Admin\OrderController@updateOrderAddOnItem1')->name('admin.order.updateOrderAddOnItem1');
			Route::post('/updateOrderAddOnItem2', 'Admin\OrderController@updateOrderAddOnItem2')->name('admin.order.updateOrderAddOnItem2');
			Route::get('/deleteOrderItem/{id}', 'Admin\OrderController@deleteOrderItem')->name('admin.order.deleteOrderItem');
			Route::get('/deleteOrderAddOnItem1/{id}', 'Admin\OrderController@deleteOrderAddOnItem1')->name('admin.order.deleteOrderAddOnItem1');
			Route::get('/deleteOrderAddOnItem2/{id}', 'Admin\OrderController@deleteOrderAddOnItem2')->name('admin.order.deleteOrderAddOnItem2');
			Route::post('/addOrderItem', 'Admin\OrderController@addOrderItem')->name('admin.order.addOrderItem');

	        Route::post('offline/couponAdd', 'Admin\OfflineOrderController@couponAdd')->name('admin.offline.couponadd');

			Route::post('offline/cart/remove', 'Admin\OfflineOrderController@cartRemove')->name('admin.offline.cart.remove');
			Route::post('offline/cart/updateaddress', 'Admin\OfflineOrderController@UpdateAddress')->name('admin.offline.updateaddress');
			Route::post('offline/cart/UpdateCartItems', 'Admin\OfflineOrderController@UpdateCartItems')->name('admin.offline.UpdateCartItems');
			Route::post('offline/cart/AmountFetch', 'Admin\OfflineOrderController@AmountFetch')->name('admin.offline.AmountFetch');
			Route::post('offline/cart/CouponAmountFetch', 'Admin\OfflineOrderController@CouponAmountFetch')->name('admin.offline.CouponAmountFetch');
			Route::post('offline/cart/CustomAmountFetch', 'Admin\OfflineOrderController@CustomAmountFetch')->name('admin.offline.CustomAmountFetch');
			Route::post('offline/cart/AmountCategoryWise', 'Admin\OfflineOrderController@AmountCategoryWise')->name('admin.offline.AmountCategoryWise');
			Route::post('offline/cart/AmountFetchItemWise', 'Admin\OfflineOrderController@AmountFetchItemWise')->name('admin.offline.AmountFetchItemWise');
		});

		Route::group(['prefix'  =>   'coupon'], function() {
			Route::get('/', 'Admin\CouponController@newList')->name('admin.coupon.index');
			//Route::get('/newlist', 'Admin\CouponController@newList')->name('admin.coupon.newlist');
			Route::get('/create', 'Admin\CouponController@create')->name('admin.coupon.create');
			// Route::post('/store', 'Admin\CouponController@store')->name('admin.coupon.store');
			Route::get('/{id}/edit', 'Admin\CouponController@edit')->name('admin.coupon.edit');
			Route::get('/{id}/history', 'Admin\CouponController@history')->name('admin.coupon.history');
			//Route::post('/update', 'Admin\CouponController@update')->name('admin.coupon.update');
			Route::get('/{id}/delete', 'Admin\CouponController@delete')->name('admin.coupon.delete');
			Route::post('updateStatus', 'Admin\CouponController@updateStatus')->name('admin.coupon.updateStatus');
			Route::get('/{id}/details', 'Admin\CouponController@details')->name('admin.coupon.details');
			Route::post('/csv-store', 'Admin\CouponController@csvStore')->name('admin.coupon.data.csv.store');
            Route::get('/export', 'Admin\CouponController@export')->name('admin.coupon.data.csv.export');
			Route::get('/createCoupons', 'Admin\CouponController@createCoupon')->name('admin.createCoupons'); 
			Route::get('/{id}/couponEdit', 'Admin\CouponController@couponEdit')->name('admin.newcoupon.edit');
			Route::post('/storeCoupon', 'Admin\CouponController@newCouponStore')->name('admin.coupon.store'); 
			Route::post('/updateCoupon', 'Admin\CouponController@newCouponUpdate')->name('admin.coupon.update'); 
		});

		Route::group(['prefix'  =>   'payout'], function() {
			Route::get('/', 'Admin\PayoutController@index')->name('admin.payout.index');
			Route::get('/create', 'Admin\PayoutController@create')->name('admin.payout.create');
			Route::post('/store', 'Admin\PayoutController@store')->name('admin.payout.store');
			Route::get('/{id}/edit', 'Admin\PayoutController@edit')->name('admin.payout.edit');
			Route::post('/update', 'Admin\PayoutController@update')->name('admin.payout.update');
			Route::get('/{id}/delete', 'Admin\PayoutController@delete')->name('admin.payout.delete');
			//Route::post('updateStatus', 'Admin\PayoutController@updateStatus')->name('admin.banner.updateStatus');
		});

		Route::group(['prefix'  =>   'wallet'], function() {
			Route::get('/', 'Admin\WalletController@index')->name('admin.wallet.index'); 
			Route::get('/wallet/credit', 'Admin\WalletController@walletCredit')->name('admin.wallet.credit');
			Route::post('/wallet/credit/store', 'Admin\WalletController@store')->name('admin.wallet.credit.store');
			
		});

		Route::group(['prefix'  =>   'accounts'], function() {
			Route::get('/', 'Admin\AccountsController@index')->name('admin.accounts.index');
			Route::get('/restaurant_accounts', 'Admin\AccountsController@restaurant_accounts')->name('admin.accounts.restaurant_accounts');
			Route::get('/online_transactions', 'Admin\AccountsController@online_transactions')->name('admin.accounts.online_transactions');
			Route::get('/cod_transactions', 'Admin\AccountsController@cod_transactions')->name('admin.accounts.cod_transactions');
			Route::get('/wallet_credits', 'Admin\AccountsController@wallet_credits')->name('admin.accounts.wallet_credits');
			Route::get('/wallet_balance', 'Admin\AccountsController@wallet_balance')->name('admin.accounts.wallet_balance');
			Route::get('/wallet_credits/export', 'Admin\AccountsController@WalletReportExport')->name('admin.accounts.wallet_credits.csv.export');
			Route::get('/restaurant_account/export', 'Admin\AccountsController@RestaurantAccountExport')->name('admin.accounts.restaurant_account.csv.export');
			
		});
		Route::get('/geofencing', 'Admin\GeoFencingController@index')->name('admin.geofencing.index');
		Route::post('/geofencing/update', 'Admin\GeoFencingController@update')->name('admin.geofencing.update');
		Route::post('/geofencingtype="text"', 'Admin\GeoFencingController@create')->name('admin.geofencing.create');
		// GeoLOcation
		Route::get('/geolocation', 'Admin\LocationController@IndexGeoLocation')->name('admin.geolocation.index');
		Route::get('/geolocation-view/{id}', 'Admin\LocationController@ViewGeoLocation')->name('admin.geolocation.view');
		Route::get('/geolocation-create', 'Admin\LocationController@CreateGeoLocation')->name('admin.geolocation.create');
		Route::get('/geocharge', 'Admin\LocationController@IndexGeoCharge')->name('admin.geocharge.index');
		Route::get('/geocharge/create', 'Admin\LocationController@CreateGeoCharge')->name('admin.geocharge.create');
		
		Route::post('/geocharge/store', 'Admin\LocationController@MultiGeoChargeStore')->name('admin.geocharge.store');
		
		Route::get('/geosurge', 'Admin\LocationController@IndexGeoSurge')->name('admin.geosurge.index');
		Route::get('/geosurge-create', 'Admin\LocationController@IndexGeoSurgeCreate')->name('admin.geosurge.create');
		Route::post('/geosurge-store', 'Admin\LocationController@IndexGeoSurgeStore')->name('admin.geosurge.store');
		Route::get('/geosurge/edit/{id}', 'Admin\LocationController@EditGeoSurge')->name('admin.geosurge.edit');
		Route::post('/geosurge/update/{id}', 'Admin\LocationController@GeoSurgeUpdate')->name('admin.geosurge.update');
		Route::get('/geosurge/delete/{id}', 'Admin\LocationController@SurgeDelete')->name('admin.geosurge.delete');
		Route::post('/geosurge/status', 'Admin\LocationController@SurgeStatus')->name('admin.geosurge.status');
		// Dummy routes for design work
		Route::group(['prefix' => 'test'], function() {
			Route::get('/1', 'Admin\TestController@testFunc1');
			Route::get('/2', 'Admin\TestController@testFunc2');
			Route::get('/3', 'Admin\TestController@testFunc3');
			Route::get('/4', 'Admin\TestController@testFunc4');
			Route::get('/5', 'Admin\TestController@testFunc5');
			Route::get('/6', 'Admin\TestController@testFunc6');
			Route::get('/7', 'Admin\TestController@testFunc7');
			Route::get('/8', 'Admin\TestController@testFunc8');
			Route::get('/9', 'Admin\TestController@testFunc9');
			Route::get('/10', 'Admin\TestController@testFunc10');
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