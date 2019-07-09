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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['namespace' => 'Frontend'], function () {
	Route::get('/', 'HomeController@index')->name('frontend.home.index');
	Route::get('/product-detail/{id}', 'HomeController@detialpro')->name('detial');
	Route::get('/get-product-attr', 'HomeController@getAttrs');
	Route::get('/cat/{url}', 'HomeController@listByCat')->name('cats');
	Route::get('/productsCat', 'HomeController@productsCat');
	Route::get('/listByCatFind', 'HomeController@listByCatFind');
	Route::get('search', 'HomeController@search');
	Route::post('/addToCart', 'CartController@addToCart')->name('addToCart');
	Route::get('/viewcart', 'CartController@index')->name('viewCart');
	Route::get('/viewcart/deleteItem/{id}', 'CartController@deleteItem')->name('deleteItem');
	Route::get('/viewcart/update-quantity/{id}/{quantity}', 'CartController@updateQuantity');
	Route::get('/viewcart/deleteCart', 'CartController@deleteCart');
	Route::get('/login_page', 'TestController@index')->name('dangnhap');
	Route::post('/register_user', 'TestController@register');
	Route::post('/user_login', 'TestController@login');
	Route::get('/logoutUser', 'TestController@logoutUser');
});

Route::group(['middleware' => 'FrontLogin_middleware'], function () {
	Route::get('/myaccount', 'TestController@account');
	Route::put('/update-password/{id}', 'TestController@updatepassword');
	Route::get('/getCheckout', 'OrderController@getCheckout');
	Route::post('/postCheckout', 'OrderController@postCheckout')->name('order');
	Route::get('/thanks', 'OrderController@thanks');
	Route::get('/atm', 'OrderController@atm');
	Route::get('/orders', 'OrderController@userOrders');
	Route::get('/orders/{id}', 'OrderController@userOrderDetails');
});

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
	Route::get('/', 'DashboardController@index')->name('backend.home.index');

//	category
	Route::get('category/delete/{id}', 'CategoryController@deleteCategoryByAjax')->name('delete.ajax');
	Route::resource('category', 'CategoryController');
	Route::get('/check_category_name', 'CategoryController@checkCateName');

//    product

	Route::resource('product', 'ProductController');
	Route::get('delete-product-image/{id}', 'ProductController@deleteProductImage');
	Route::get('delete-product/{id}', 'ProductController@destroy');

	Route::resource('/product_att', 'ProductAttController');
	Route::get('delete-attribute/{id}', 'ProductAttController@deleteAttr');
//images
	Route::resource('/images', 'ImagesController');
	Route::get('delete-image/{id}', 'ImagesController@destroy');

//    user
	Route::resource('user', 'UserController');

	Route::get('delete-user/{id}', 'UserController@destroy')->name('delete-user');
	//Admin Orders Route
	Route::get('/view-orders', 'OrdersAdController@viewOrders');

//Admin Order Detail Page
	Route::get('/view-order/{id}', 'OrdersAdController@viewOrderDetails');

//Update Order Status
	Route::post('/update-order-status', 'OrdersAdController@updateOrderStatus');
//slider
	Route::resource('slider', 'SliderController');
	Route::get('delete-slider/{id}', 'SliderController@destroy');
});
Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@logout');
