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
//Artisan::call('up');

//Artisan::call('down');


View::composer('*', function ($view) {
    //
    $logo=App\Logo::first();
    $view->with('logo',  $logo);
});


Route::get('/admin/logo/home', 'LogoController@create')->name('admins.home');
Route::post('/admin/logo/update', 'LogoController@update')->name('admins.logo.update');


Route::get('/admin/headers', 'HeaderController@index')->name('admins.headers.index');
Route::get('/admin/header/create', 'HeaderController@create')->name('admins.header.create');
Route::get('/admin/header/edit/{id}', 'HeaderController@edit')->name('admins.header.edit');
Route::post('/admin/header/update/{id}', 'HeaderController@update')->name('admins.header.update');
Route::post('/admin/header/store', 'HeaderController@store')->name('admins.header.store');
Route::get('/admin/header/delete/{header}', 'HeaderController@destroy')->name('admins.header.delete');

Route::get('/admin/categories', 'CategoryController@index')->name('admins.categories.index');
Route::get('/admin/category/create', 'CategoryController@create')->name('admins.category.create');
Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('admins.category.edit');
Route::post('/admin/category/update/{id}', 'CategoryController@update')->name('admins.category.update');
Route::post('/admin/category/store', 'CategoryController@store')->name('admins.category.store');
Route::get('/admin/category/delete/{category}', 'CategoryController@destroy')->name('admins.category.delete');

Route::get('/admin/sub_categories', 'SubCategoryController@index')->name('admins.sub-categories.index');
Route::get('/admin/sub_category/create', 'SubCategoryController@create')->name('admins.sub-category.create');
Route::get('/admin/sub_category/edit/{id}', 'SubCategoryController@edit')->name('admins.sub-category.edit');
Route::post('/admin/sub_category/update/{id}', 'SubCategoryController@update')->name('admins.sub-category.update');
Route::post('/admin/sub_category/store', 'SubCategoryController@store')->name('admins.sub-category.store');
Route::get('/admin/sub_category/delete/{sub_category}', 'SubCategoryController@destroy')->name('admins.sub-category.delete');


Route::get('/admin/works', 'WorkController@index')->name('admins.works.index');
Route::get('/admin/work/create', 'WorkController@create')->name('admins.work.create');
Route::get('/admin/work/edit/{id}', 'WorkController@edit')->name('admins.work.edit');
Route::post('/admin/work/update/{id}', 'WorkController@update')->name('admins.work.update');
Route::post('/admin/work/store', 'WorkController@store')->name('admins.work.store');
Route::get('/admin/work/delete/{work}', 'WorkController@destroy')->name('admins.work.delete');


Route::get('/admin/clients', 'ClientController@index')->name('admins.clients.index');
Route::get('/admin/client/create', 'ClientController@create')->name('admins.client.create');
Route::get('/admin/client/edit/{id}', 'ClientController@edit')->name('admins.client.edit');
Route::post('/admin/client/update/{id}', 'ClientController@update')->name('admins.client.update');
Route::post('/admin/client/store', 'ClientController@store')->name('admins.client.store');
Route::get('/admin/client/delete/{client}', 'ClientController@destroy')->name('admins.client.delete');

Route::get('/admin/gallaries', 'GallaryController@index')->name('admins.gallaries.index');
Route::get('/admin/gallary/create', 'GallaryController@create')->name('admins.gallary.create');
Route::get('/admin/gallary/edit/{id}', 'GallaryController@edit')->name('admins.gallary.edit');
Route::post('/admin/gallary/update/{id}', 'GallaryController@update')->name('admins.gallary.update');
Route::post('/admin/gallary/store', 'GallaryController@store')->name('admins.gallary.store');
Route::get('/admin/gallary/delete/{gallary}', 'GallaryController@destroy')->name('admins.gallary.delete');

Route::get('/admin/contacts', 'ContactController@index')->name('admins.contacts.index');
Route::get('/admin/contact/create', 'ContactController@create')->name('admins.contact.create');
Route::get('/admin/contact/edit/{id}', 'ContactController@edit')->name('admins.contact.edit');
Route::post('/admin/contact/update', 'ContactController@update')->name('admins.contact.update');
Route::post('/admin/contact/store', 'ContactController@store')->name('admins.contact.store');
Route::get('/admin/contact/delete/{contact}', 'ContactController@destroy')->name('admins.contact.delete');

Route::get('/maintenance', function () {
    return view('maintenance');
    
})->name('maintenance');


/*Route::get('/', function () {
    return view('home');
    
})->name('home');*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');


Route::get('/portfolio', 'PortfolioController@index')->name('portfolio');

Route::get('/category_details', function () {
    return view('category_details');
    
})->name('category_details');

