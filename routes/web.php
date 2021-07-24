<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
	

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function(){


	// ajax route
	Route::get('fetch/category_brands/{category}','ProductController@category_brands');
	Route::get('fetch_products','OrderController@fetch_products');
	Route::post('fetch_single_product','OrderController@fetch_single_product');
	Route::post('fetch_customer','OrderController@fetch_customer');
	
	// custom permission route
	Route::get('permission/filter','PermissionController@filter')->name('permission.filter');
	// Route::get('orders/filter','CustomerController@filter')->name('orders.filter');
	// custom permission route end here

	// custom customer route
	Route::get('customer/orders','CustomerController@orders')->name('orders.filter');

	// custom customer route end here

	Route::resource('user','UserController');
	Route::resource('role','RoleController');
	Route::resource('category','CategoryController');
	Route::resource('permission','PermissionController');
	Route::resource('brand','BrandController');
	Route::resource('product','ProductController');
	Route::resource('customer','CustomerController');
	Route::resource('order','OrderController');

});



// product filter route
	Route::get('/filters','ProductfilterController@index');
	Route::post('/fetch_products','ProductfilterController@fetch_products');


// product filter route end here


// sql testing route
	Route::get('/sql','ProductfilterController@sql');
// sql route end here


