<?php


Route::get('/home', 'Web\WebController@show');
Route::get('/', 'Web\WebController@show');
Route::get('/blog/{id}', 'Web\WebController@blog');
Route::get('/coba_email','Web\WebController@coba_email'); 
Route::post('/contact_us', 'Web\WebController@send');



Route::get('/admin/login', 'Cms\LoginController@show');
Route::get('/admin/', 'Cms\LoginController@show');
Route::post('/admin/login', 'Cms\LoginController@login');
Route::get('/admin/logout', 'Cms\LoginController@logout');

// ABOUT===========TAMPIL=======================
// menampilkan tabel about di admin
Route::get('/admin/about', 'Cms\AboutController@show');
// menampilkan form input di admin
Route::get('admin/about/input', 'Cms\AboutController@input');
// menampilkan form edit di admin
Route::get('admin/about/{id}/edit','Cms\AboutController@edit');  
// memanggil fungsi insert
Route::post('admin/about/input','Cms\AboutController@insert'); 
// memanggil fungsi update
Route::put('admin/about/{id}/edit','Cms\AboutController@update');  
// memanggil fungsi delete
Route::delete('admin/about/{id}/delete','Cms\AboutController@delete');


// Slider ===========TAMPIL=======================
// menampilkan tabel slider di admin
Route::get('/admin/slider', 'Cms\SliderController@show');
// menampilkan form input di admin
Route::get('admin/slider/input', 'Cms\SliderController@input');
// menampilkan form edit di admin
Route::get('admin/slider/{id}/edit','Cms\SliderController@edit');  
// memanggil fungsi insert
Route::post('admin/slider/input','Cms\SliderController@insert'); 
// memanggil fungsi update
Route::put('admin/slider/{id}/edit','Cms\SliderController@update');  
// memanggil fungsi delete
Route::delete('admin/slider/{id}/delete','Cms\SliderController@delete');


// Feature ===========TAMPIL=======================
// menampilkan tabel feature di admin
Route::get('/admin/feature', 'Cms\FeatureController@show');
// menampilkan form input di admin
Route::get('admin/feature/input', 'Cms\FeatureController@input');
// menampilkan form edit di admin
Route::get('admin/feature/{id}/edit','Cms\FeatureController@edit');  
// memanggil fungsi insert
Route::post('admin/feature/input','Cms\FeatureController@insert'); 
// memanggil fungsi update
Route::put('admin/feature/{id}/edit','Cms\FeatureController@update');  
// memanggil fungsi delete
Route::delete('admin/feature/{id}/delete','Cms\FeatureController@delete');


// Portfolio ===========TAMPIL=======================
// menampilkan tabel portfolio di admin
Route::get('/admin/portfolio', 'Cms\PortfolioController@show');
// menampilkan form input di admin
Route::get('admin/portfolio/input', 'Cms\PortfolioController@input');
// menampilkan form edit di admin
Route::get('admin/portfolio/{id}/edit','Cms\PortfolioController@edit');  
// memanggil fungsi insert
Route::post('admin/portfolio/input','Cms\PortfolioController@insert'); 
// memanggil fungsi update
Route::put('admin/portfolio/{id}/edit','Cms\PortfolioController@update');  
// memanggil fungsi delete
Route::delete('admin/portfolio/{id}/delete','Cms\PortfolioController@delete');


// Client ===========TAMPIL=======================
// menampilkan tabel client di admin
Route::get('/admin/client', 'Cms\ClientController@show');
// menampilkan form input di admin
Route::get('admin/client/input', 'Cms\ClientController@input');
// menampilkan form edit di admin
Route::get('admin/client/{id}/edit','Cms\ClientController@edit');  
// memanggil fungsi insert
Route::post('admin/client/input','Cms\ClientController@insert'); 
// memanggil fungsi update
Route::put('admin/client/{id}/edit','Cms\ClientController@update');  
// memanggil fungsi delete
Route::delete('admin/client/{id}/delete','Cms\ClientController@delete');


// Team ===========TAMPIL=======================
// menampilkan tabel client di admin
Route::get('/admin/team', 'Cms\TeamController@show');
// menampilkan form input di admin
Route::get('admin/team/input', 'Cms\TeamController@input');
// menampilkan form edit di admin
Route::get('admin/team/{id}/edit','Cms\TeamController@edit');  
// memanggil fungsi insert
Route::post('admin/team/input','Cms\TeamController@insert'); 
// memanggil fungsi update
Route::put('admin/team/{id}/edit','Cms\TeamController@update');  
// memanggil fungsi delete
Route::delete('admin/team/{id}/delete','Cms\TeamController@delete');


// Sosmed ===========TAMPIL=======================
// menampilkan tabel client di admin
Route::get('/admin/sosmed', 'Cms\SosmedController@show');
// menampilkan form input di admin
Route::get('admin/sosmed/input', 'Cms\SosmedController@input');
// menampilkan form edit di admin
Route::get('admin/sosmed/{id}/edit','Cms\SosmedController@edit');  
// memanggil fungsi insert
Route::post('admin/sosmed/input','Cms\SosmedController@insert'); 
// memanggil fungsi update
Route::put('admin/sosmed/{id}/edit','Cms\SosmedController@update');  
// memanggil fungsi delete
Route::delete('admin/sosmed/{id}/delete','Cms\SosmedController@delete');


// Career ===========TAMPIL=======================
// menampilkan tabel client di admin
Route::get('/admin/career', 'Cms\CareerController@show');
// menampilkan form input di admin
Route::get('admin/career/input', 'Cms\CareerController@input');
// menampilkan form edit di admin
Route::get('admin/career/{id}/edit','Cms\CareerController@edit');  
// memanggil fungsi insert
Route::post('admin/career/input','Cms\CareerController@insert'); 
// memanggil fungsi update
Route::put('admin/career/{id}/edit','Cms\CareerController@update');  
// memanggil fungsi delete
Route::delete('admin/career/{id}/delete','Cms\CareerController@delete');


// Comment ===========TAMPIL=======================
// menampilkan tabel client di admin
Route::get('/admin/comment', 'Cms\CommentController@show');
// menampilkan form input di admin
Route::get('admin/comment/input', 'Cms\CommentController@input');
// menampilkan form edit di admin
Route::get('admin/comment/{id}/edit','Cms\CommentController@edit');  
// memanggil fungsi insert
Route::post('admin/comment/input','Cms\CommentController@insert'); 
// memanggil fungsi update
Route::put('admin/comment/{id}/edit','Cms\CommentController@update');  
// memanggil fungsi delete
Route::delete('admin/comment/{id}/delete','Cms\CommentController@delete');


// Blog ===========TAMPIL=======================
// menampilkan tabel client di admin
Route::get('/admin/blog', 'Cms\BlogController@show');
// menampilkan form input di admin
Route::get('admin/blog/input', 'Cms\BlogController@input');
// menampilkan form edit di admin
Route::get('admin/blog/{id}/edit','Cms\BlogController@edit');  
// memanggil fungsi insert
Route::post('admin/blog/input','Cms\BlogController@insert'); 
// memanggil fungsi update
Route::put('admin/blog/{id}/edit','Cms\BlogController@update');  
// memanggil fungsi delete
Route::delete('admin/blog/{id}/delete','Cms\BlogController@delete');


// Address ===========TAMPIL=======================
// menampilkan tabel client di admin
Route::get('/admin/address', 'Cms\AddressController@show');
// menampilkan form input di admin
Route::get('admin/address/input', 'Cms\AddressController@input');
// menampilkan form edit di admin
Route::get('admin/address/{id}/edit','Cms\AddressController@edit');  
// memanggil fungsi insert
Route::post('admin/address/input','Cms\AddressController@insert'); 
// memanggil fungsi update
Route::put('admin/address/{id}/edit','Cms\AddressController@update');  
// memanggil fungsi delete
Route::delete('admin/address/{id}/delete','Cms\AddressController@delete');

// Contact ===========TAMPIL=======================
// menampilkan tabel client di admin
Route::get('/admin/contact', 'Cms\ContactController@show');
// menampilkan form input di admin
Route::get('admin/contact/input', 'Cms\ContactController@input');
// menampilkan form edit di admin
Route::get('admin/contact/{id}/edit','Cms\ContactController@edit');  
// memanggil fungsi insert
Route::post('admin/contact/input','Cms\ContactController@insert'); 
// memanggil fungsi update
Route::put('admin/contact/{id}/edit','Cms\ContactController@update');  
// memanggil fungsi delete
Route::delete('admin/contact/{id}/delete','Cms\ContactController@delete');

