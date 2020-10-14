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

//Route::get('/', function () {
    //return view('front/home','PageController@index');
//});
Route::get('/','PageController@Index'); 
Route::get('/shop','PageController@shop');
Route::get('/category/{id}','PageController@showCats');  
Route::get('/contact','PageController@contact');
Route::get('/product_detail/{id}','PageController@product_detail');
Route::get('/admin','AdminController@Index');//->middleware('admin');
Route::delete('/product/{product}','ProductController@destroy');
Route::get('/admin/product','ProductController@index');
Route::get('/admin/product/create','ProductController@create');
Route::post('/admin/product/store','ProductController@store');
Route::delete('/admin/product/{product}','ProductController@destroy');
Route::post('/admin/category/store','CategoriesController@store');
Route::get('/admin/category/index','CategoriesController@index');
Route::get('/cart','CartController@index');
Route::get('/cart/addItem/{id}','CartController@addItem');
Route::put('/cart/update/{id}','CartController@update');
Route::get('/cart/remove/{id}','CartController@remove');
Route::get('/checkout','CheckoutController@index');
Route::post('/formvalidate','CheckoutController@address');
Route::get('/profile','ProfileController@index');
Route::get('/orders','ProfileController@orders');
Route::get('/address','ProfileController@address');
Route::post('/updateAddress','ProfileController@updateAddress');
Route::get('/password','ProfileController@password');
Route::put('/updatePassword','ProfileController@updatePassword');
Route::get('/wishlist','ProfileController@wishlist');
Route::post('/addWishlist','ProfileController@addWishlist');
Route::get('/removeWishList/{id}','ProfileController@removeWishList');


Auth::routes();

Route::get('/home', 'HomeController@index');
//Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
	//Route::get('/admin',function(){
		//return view('admin.home');
	//});
	//Route::get('/','AdminController@Index');
//});

//this is for custom login
//Route::post('/log', 'Custom_login_controller@index');
//Route::get('/log', 'Custom_login_controller@main_log');


