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


Route::get('/', 'frontend\ControllerFrontend@index');
Auth::routes();




Route::get('/about', 'frontend\ControllerFrontend@about')->name('about');
Route::get('/shoping-cart', 'frontend\ControllerFrontend@shopinCart')->name('shoping.cart');
Route::get('/contact', 'frontend\ControllerFrontend@contact')->name('contact');
Route::post('/communicate', 'frontend\ControllerFrontend@communicate')->name('communicate');
Route::get('/all-products', 'frontend\ControllerFrontend@allProducts')->name('all.products');
Route::get('/category-wais-products/{category_id}', 'frontend\ControllerFrontend@categoryWaisProducts')->name('category.products');
Route::get('/brand-wais-products/{brand_id}', 'frontend\ControllerFrontend@brandWaisProducts')->name('brand.products');
Route::get('/products-details/{slug}', 'frontend\ControllerFrontend@ProductInfoDetails')->name('product.info.details');
Route::post('/search', 'frontend\ControllerFrontend@Search')->name('search');
Route::get('/get-product', 'frontend\ControllerFrontend@getProduct')->name('get.product');
// shopint cart routes
Route::post('/add-to-cart', 'frontend\ControllerCart@addTocart')->name('insert.cart');
Route::get('/show-cart', 'frontend\ControllerCart@showTocart')->name('show.cart');
Route::post('/update-cart', 'frontend\ControllerCart@updateTocart')->name('cart.update');
Route::get('/delete-cart/{rowId}', 'frontend\ControllerCart@deleteTocart')->name('cart.delete');

// coustomer login 
Route::get('/customer-login', 'frontend\ControllerCheckout@customerLogin')->name('login.customer');
Route::get('/customer-signup', 'frontend\ControllerCheckout@customerSignup')->name('signup.customer');
Route::post('/customer-store', 'frontend\ControllerCheckout@customerStore')->name('signup.store');


// verify signup
Route::get('/customer-verify', 'frontend\ControllerCheckout@customerVerify')->name('customer.verify');
Route::post('/email-verify', 'frontend\ControllerCheckout@emailVerify')->name('email.verify');
Route::get('/chaeckout', 'frontend\ControllerCheckout@chaeckOut')->name('customer.chaeckout');
Route::post('/chaeckout/store', 'frontend\ControllerCheckout@chaeckOutstore')->name('customer.chaeckout.store');


Route::group(['middleware'=>['auth','customer']],function(){
	Route::get('/dashboard','frontend\ControlllerDashboard@dashboard')->name('dashboard');
	Route::get('/dashboard-edit','frontend\ControlllerDashboard@dashboardEdit')->name('dashboard.edit');
	Route::post('/dashboard-update','frontend\ControlllerDashboard@dashboardUpdate')->name('dashboard.update');
	Route::get('/change/dashboard-password', 'frontend\ControlllerDashboard@changedashboardPassword')->name('dashboard.password.view');
	Route::post('/Update/dashboard-password', 'frontend\ControlllerDashboard@updatedashboardPassword')->name('dashboard.password.update');

	Route::get('/chaeckout/payments', 'frontend\ControlllerDashboard@checkoutPayments')->name('checkout.payments');
	Route::post('/chaeckout/payments/store', 'frontend\ControlllerDashboard@checkoutPaymentStore')->name('checkout.payments.store');
	Route::get('/order/list', 'frontend\ControlllerDashboard@OrderList')->name('order.list');
	Route::get('/order-details/{id}', 'frontend\ControlllerDashboard@OrderDetails')->name('order.details');

});

Route::group(['middleware'=>['auth','Admin']],function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::prefix('users')->group(function(){
		Route::get('/view', 'backend\ControllerBackend@view')->name('user.view');
		Route::get('/add', 'backend\ControllerBackend@add')->name('user.add');
		Route::post('/store', 'backend\ControllerBackend@store')->name('user.store');
		Route::get('/edit/{id}', 'backend\ControllerBackend@edit')->name('user.edit');
		Route::post('/update/{id}', 'backend\ControllerBackend@update')->name('user.update');
		Route::post('/delete', 'backend\ControllerBackend@delete')->name('user.delete');

	});

	Route::prefix('profils')->group(function(){
		Route::get('/view', 'backend\ControllerProfile@view')->name('profils.view');
		Route::get('/edit', 'backend\ControllerProfile@edit')->name('profils.edit');
		Route::post('/update', 'backend\ControllerProfile@update')->name('profils.update');
		Route::get('/change/password', 'backend\ControllerProfile@changePassword')->name('profils.password.view');
		Route::post('/update/password', 'backend\ControllerProfile@updatePassword')->name('profils.password.update');

	});

	Route::prefix('logos')->group(function(){
		Route::get('/view', 'backend\ControllerLogo@view')->name('logos.view');
		Route::get('/add', 'backend\ControllerLogo@add')->name('logos.add');
		Route::post('/store', 'backend\ControllerLogo@store')->name('logos.store');
		Route::get('/edit/{id}', 'backend\ControllerLogo@edit')->name('logos.edit');
		Route::post('/update/{id}', 'backend\ControllerLogo@update')->name('logos.update');
		Route::post('/delete', 'backend\ControllerLogo@delete')->name('logos.delete');

	});

	Route::prefix('banners')->group(function(){
		Route::get('/view', 'backend\Controllerbanner@view')->name('banners.view');
		Route::get('/add', 'backend\Controllerbanner@add')->name('banners.add');
		Route::post('/store', 'backend\Controllerbanner@store')->name('banners.store');
		Route::get('/edit/{id}', 'backend\Controllerbanner@edit')->name('banners.edit');
		Route::post('/update/{id}', 'backend\Controllerbanner@update')->name('banners.update');
		Route::post('/delete', 'backend\Controllerbanner@delete')->name('banners.delete');

	});


	Route::prefix('abouts')->group(function(){
		Route::get('/view', 'backend\Controllerabout@view')->name('abouts.view');
		Route::get('/add', 'backend\Controllerabout@add')->name('abouts.add');
		Route::post('/store', 'backend\Controllerabout@store')->name('abouts.store');
		Route::get('/edit/{id}', 'backend\Controllerabout@edit')->name('abouts.edit');
		Route::post('/update/{id}', 'backend\Controllerabout@update')->name('abouts.update');
		Route::post('/delete', 'backend\Controllerabout@delete')->name('abouts.delete');

	});
	Route::prefix('contacts')->group(function(){
		Route::get('/view', 'backend\ControllerContacts@view')->name('contacts.view');
		Route::get('/add', 'backend\ControllerContacts@add')->name('contacts.add');
		Route::post('/store', 'backend\ControllerContacts@store')->name('contacts.store');
		Route::get('/edit/{id}', 'backend\ControllerContacts@edit')->name('contacts.edit');
		Route::post('/update/{id}', 'backend\ControllerContacts@update')->name('contacts.update');
		Route::post('/delete', 'backend\ControllerContacts@delete')->name('contacts.delete');

		Route::get('/communicate/view', 'backend\ControllerContacts@communicateview')->name('communicate.view');

		Route::post('/communicate/delete', 'backend\ControllerContacts@communicatedelete')->name('communicate.delete');

	});

	Route::prefix('categorys')->group(function(){
		Route::get('/view', 'backend\Controllercategory@view')->name('categorys.view');
		Route::get('/add', 'backend\Controllercategory@add')->name('categorys.add');
		Route::post('/store', 'backend\Controllercategory@store')->name('categorys.store');
		Route::get('/edit/{id}', 'backend\Controllercategory@edit')->name('categorys.edit');
		Route::post('/update/{id}', 'backend\Controllercategory@update')->name('categorys.update');
		Route::post('/delete', 'backend\Controllercategory@delete')->name('categorys.delete');

	});

	Route::prefix('brands')->group(function(){
		Route::get('/view', 'backend\Controllerbrand@view')->name('brands.view');
		Route::get('/add', 'backend\Controllerbrand@add')->name('brands.add');
		Route::post('/store', 'backend\Controllerbrand@store')->name('brands.store');
		Route::get('/edit/{id}', 'backend\Controllerbrand@edit')->name('brands.edit');
		Route::post('/update/{id}', 'backend\Controllerbrand@update')->name('brands.update');
		Route::post('/delete', 'backend\Controllerbrand@delete')->name('brands.delete');

	});

	Route::prefix('colors')->group(function(){
		Route::get('/view', 'backend\Controllercolor@view')->name('colors.view');
		Route::get('/add', 'backend\Controllercolor@add')->name('colors.add');
		Route::post('/store', 'backend\Controllercolor@store')->name('colors.store');
		Route::get('/edit/{id}', 'backend\Controllercolor@edit')->name('colors.edit');
		Route::post('/update/{id}', 'backend\Controllercolor@update')->name('colors.update');
		Route::post('/delete', 'backend\Controllercolor@delete')->name('colors.delete');

	});

	Route::prefix('sizes')->group(function(){
		Route::get('/view', 'backend\Controllersize@view')->name('sizes.view');
		Route::get('/add', 'backend\Controllersize@add')->name('sizes.add');
		Route::post('/store', 'backend\Controllersize@store')->name('sizes.store');
		Route::get('/edit/{id}', 'backend\Controllersize@edit')->name('sizes.edit');
		Route::post('/update/{id}', 'backend\Controllersize@update')->name('sizes.update');
		Route::post('/delete', 'backend\Controllersize@delete')->name('sizes.delete');

	});

	Route::prefix('products')->group(function(){
		Route::get('/view', 'backend\Controllerproduct@view')->name('products.view');
		Route::get('/add', 'backend\Controllerproduct@add')->name('products.add');
		Route::post('/store', 'backend\Controllerproduct@store')->name('products.store');
		Route::get('/edit/{id}', 'backend\Controllerproduct@edit')->name('products.edit');
		Route::post('/update/{id}', 'backend\Controllerproduct@update')->name('products.update');
		Route::post('/delete', 'backend\Controllerproduct@delete')->name('products.delete');
		Route::get('/details/{id}', 'backend\Controllerproduct@details')->name('products.details');

	});


	Route::prefix('customers')->group(function(){
		// customer view
		Route::get('/view', 'backend\Controllercustomer@customerview')->name('customers.view'); 
		Route::get('/draft', 'backend\Controllercustomer@customerdraft')->name('customers.draft');
		Route::post('/delete', 'backend\Controllercustomer@customerdelete')->name('customers.delete');

	});
	Route::prefix('orders')->group(function(){
		// customer view
		Route::get('/pandding', 'backend\Controllerorder@OrderPanddingView')->name('orders.pandding.view'); 
		Route::get('/approve', 'backend\Controllerorder@OrderApproveView')->name('orders.approve.view');
		Route::get('/details/{id}', 'backend\Controllerorder@OrderDetailsView')->name('orders.details.view');
		Route::post('/approve-order', 'backend\Controllerorder@OrderApprove')->name('orders.approve');

	});
	Route::prefix('payments')->group(function(){
		Route::get('/view', 'backend\Controllerpayments@view')->name('payments.view');
		Route::get('/add', 'backend\Controllerpayments@add')->name('payments.add');
		Route::post('/store', 'backend\Controllerpayments@store')->name('payments.store');
		Route::get('/edit/{id}', 'backend\Controllerpayments@edit')->name('payments.edit');
		Route::post('/update/{id}', 'backend\Controllerpayments@update')->name('payments.update');
		Route::post('/delete', 'backend\Controllerpayments@delete')->name('payments.delete');

		Route::get('/methods/view', 'backend\ControllerMethode@view')->name('methods.view');
		Route::get('/methods/add', 'backend\ControllerMethode@add')->name('methods.add');
		Route::post('/methods/store', 'backend\ControllerMethode@store')->name('methods.store');
		Route::get('/methods/edit/{id}', 'backend\ControllerMethode@edit')->name('methods.edit');
		Route::post('/methods/update/{id}', 'backend\ControllerMethode@update')->name('methods.update');
		Route::post('/methods/delete', 'backend\ControllerMethode@delete')->name('methods.delete');
		

	});

	
});
