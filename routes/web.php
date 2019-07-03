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

/*Route::get('/', function () {
    return view('welcome');
})->name('welcome');*/
Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/welcome', 'HomeController@index');
Route::get('/details/{id}', 'HomeController@details')->name('details');
Route::get('/category/{id}', 'HomeController@category')->name('home.category');
Route::post('/comment', 'HomeController@addComment')->name('comment.add');
// Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');


Route::group(['prefix' => 'admin'], function(){ 
    Route::get('/', 'admin\AdminController@index')->name('admin.index');
  	// Admin Login Routes
  	Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
  	Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  	Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');
  	// Password Email Send
  	Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  	Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  	// Password Reset
  	Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  	Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');
  	 
    Route::get('/api/users', 'admin\AdminController@vueindex');
    Route::get('/users', 'admin\AdminController@showAdmins')->name('admin.users.index');
  	Route::post('/user/add', 'admin\AdminController@create_user')->name('admin.user.add'); 
    Route::get('/user/add', 'admin\AdminController@addUser')->name('admin.user.add');
    Route::get('/user/profile/', 'admin\AdminController@profile')->name('admin.profile');
    Route::get('/user/edit/{id}', 'admin\AdminController@edit')->name('admin.user.edit'); 
    Route::post('/user/edit', 'admin\AdminController@store')->name('admin.profile.edit'); 
    Route::post('/user/profile/update/', 'admin\AdminController@update')->name('admin.profile.update'); 

    Route::get('/user/delete/{id}', 'admin\AdminController@delete')->name('admin.delete'); 

    Route::get('/api/users', 'admin\AdminController@adminIndex');
    Route::get('/api/customers', 'admin\CustomerConteroller@customerIndex'); 
    Route::get('/api/category', 'admin\CategoryController@categoryIndex');
    //Route::get('/api/posts', 'admin\PostController@postsIndex'); 
    
    Route::get('/customer', 'admin\CustomerConteroller@index')->name('admin.customer.index');
    Route::get('/customer/show/{id}', 'admin\CustomerConteroller@show')->name('admin.customer.show');
    Route::get('/customer/add', 'admin\CustomerConteroller@add')->name('admin.customer.add');
    Route::post('/customer/add', 'admin\CustomerConteroller@create')->name('admin.customer.create');
    Route::get('/customer/edit/{id}', 'admin\CustomerConteroller@edit')->name('admin.customer.edit');
    Route::post('/customer/update', 'admin\CustomerConteroller@update')->name('admin.customer.update');
    Route::get('/customer/delete/{id}', 'admin\CustomerConteroller@delete')->name('customer.delete');

    Route::get('/category', 'admin\CategoryController@index')->name('admin.category.index');
    Route::get('/category/add', 'admin\CategoryController@create')->name('admin.category.add');
    Route::post('/category/add', 'admin\CategoryController@store')->name('admin.category.add');
    Route::get('/category/edit/{id}', 'admin\CategoryController@edit')->name('admin.category.edit');
    Route::post('/category/update/{id}', 'admin\CategoryController@update')->name('admin.category.update');
    Route::get('/category/delete/{id}', 'admin\CategoryController@destroy')->name('category.delete');
    Route::get('/user/export', 'admin\AdminController@export')->name('admin.user.export');
    Route::get('customer/excel','admin\CustomerConteroller@excel')->name('admin.customer.excel');  
 
    /*Route::get('/post/create', 'admin\PostController@add')->name('admin.post.add');
    Route::post('/post/create', 'admin\PostController@add')->name('admin.post.add');
    Route::get('/post/edit/{id}', 'admin\PostController@edit')->name('admin.post.edit');
    Route::post('/post/update/{id}', 'admin\PostController@update');
    Route::delete('/post/delete/{id}', 'admin\PostController@delete')->name('admin.post.delete');
    Route::get('/posts', 'admin\PostController@index')->name('admin.post.index'); 

    Route::get('/category/create', 'admin\CategoryController@add')->name('admin.category.add');
    Route::post('/category/create', 'admin\CategoryController@add')->name('admin.category.add');
    Route::get('/category/edit/{id}', 'admin\CategoryController@edit')->name('admin.category.edit');
    Route::post('/category/update/{id}', 'admin\CategoryController@update');
    Route::delete('/category/delete/{id}', 'admin\CategoryController@delete')->name('admin.category.delete');
    Route::get('/category', 'admin\CategoryController@index')->name('admin.category.index');*/ 
});  
  Auth::routes(); 
  Route::get('/sentmail',  'HomeController@sentmail');  
 
  Route::get('/register', function () { return view('welcome'); })->name('register');
  Route::get('/login', function () { return view('welcome'); })->name('login'); 
  Route::post('/login/submit', 'Auth\LoginController@login')->name('login.submit');
  Route::post('/logout/submit', 'Auth\LoginController@logout')->name('logout');

  Route::get('/user/profile/', 'UsersController@profile')->name('profile'); 
  Route::post('/user/profile/update/', 'UsersController@update')->name('profile.update'); 
  
  
 
