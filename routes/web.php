
<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(['namespace' => 'Admin'], function () {

  // Start route dashboard

  Route::get('dashboard', 'DashboardController@selectData')->name('dashboard');

  // End route dashboard


  // route login admin
  Route::get('admin', 'AdminController@adminLogin')->name('loginAdmin');
  Route::post('admin/login', 'AdminController@login')->name('adminlogin');
  // end route login admin

  // // Start route members

  Route::get('users', 'UserController@index')->name('users');

  Route::get('addUser', 'UserController@create')->name('addUser');

  Route::post('saveUser', 'UserController@store')->name('saveUser');

  Route::get('user/{id}/edit', 'UserController@edit')->name('editUser');

  Route::post('user/{id}/update', 'UserController@update')->name('updateUser');

  Route::get('user/{id}/delete', 'UserController@destroy')->name('deleteUser');

  Route::get('user/{id}/activate', 'UserController@activate')->name('activate');

  Route::get('usersPending', 'UserController@userPending')->name('usersPending');

  // // End route members





  // // Start route categories

  route::get('categories', 'CategorieController@index')->name('categories');

  route::get('addCategory', 'CategorieController@create')->name('addCategory');

  route::post('saveCategory', 'CategorieController@store')->name('saveCategory');

  route::get('eidt/{id}/category', 'CategorieController@edit')->name('editCategory');

  route::post('update/{id}/Category', 'CategorieController@update')->name('updateCategory');

  route::get('delete/{id}/Category', 'CategorieController@destroy')->name('deleteCategory');


  // // End route categories


  // // Start route items

  route::get('items', 'ItemController@index')->name('items');

  route::get('addItem', 'ItemController@create')->name('addItem');

  route::post('saveItem', 'ItemController@store')->name('saveItem');

  route::get('edit/{id}/items', 'ItemController@edit')->name('edititems');

  route::post('update/{id}/item', 'ItemController@update')->name('updateItem');

  route::get('delete/{id}/Item', 'ItemController@destroy')->name('deleteItem');

  route::get('approve/{id}/Item', 'ItemController@approved')->name('approved');

  // // End route items


  // // Start route comments

  route::get('comments', 'CommentController@index')->name('comments');

  route::get('edit/{id}/comment', 'CommentController@edit')->name('editcomment');

  route::post('update/{id}/comment', 'CommentController@update')->name('updatecomment');

  route::get('delete/{id}/comment', 'CommentController@destroy')->name('deleteComment');

  route::get('approve/{id}/comment', 'CommentController@approve')->name('approveComment');

  // // End route comments

  // Route pdf library
  Route::get('catPDF', 'PrintController@catPDF')->name('catPDF');
  Route::get('userPDF', 'PrintController@userPDF')->name('userPDF');
});




// Start website route


// route all view
route::get('/', 'HomeController@index')->name('index');

route::get('view/{id}/category', 'HomeController@category')->name('category');

route::get('view/{id}/item', 'HomeController@show')->name('showItem');

// route view login just

route::post('add/{id}/comment', 'WebsiteController@addComment')->name('addComment');

route::get('/index', 'HomeController@index')->name('home');

route::get('profile', 'WebsiteController@profile')->name('profile');

route::get('newItem', 'WebsiteController@create')->name('newItem');

route::post('createItem', 'WebsiteController@store')->name('createItem');

route::get('edit{id}profile', 'WebsiteController@edit')->name('editProfile');

route::post('save{id}profile', 'WebsiteController@update')->name('saveProfile');

route::get('destroy/{id}/comment', 'WebsiteController@delcomment')->name('delcomment');

// End website route
