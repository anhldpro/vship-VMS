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
Auth::routes();
Route::post('/logout','Login\LoginController@getLogout')->name('admin.logout');

	//----------------------------------------ADMIN-------------------------------------------------

	Route::group( [ 'prefix' => 'admin' ,'middleware' => 'auth'], function() {
	
	Route::get('users',['as'=>'users.index','uses'=>'User\UserController@index','middleware' => ['permission:user-role-list|user-role-create|user-role-edit|user-role-delete']]);
	Route::get('users/create',['as'=>'users.create','uses'=>'User\UserController@create','middleware' => ['permission:user-role-create']]);
	Route::post('users/create',['as'=>'users.store','uses'=>'User\UserController@store','middleware' => ['permission:user-role-create']]);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'User\UserController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'User\UserController@edit','middleware' => ['permission:user-role-edit']]);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'User\UserController@update','middleware' => ['permission:user-role-edit']]);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'User\UserController@destroy','middleware' => ['permission:user-role-delete']]);

	Route::get('roles',['as'=>'roles.index','uses'=>'User\RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'User\RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'User\RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'User\RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'User\RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'User\RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'User\RoleController@destroy','middleware' => ['permission:role-delete']]);

	//---------------------------------------Admin News-------------------------------------------- 
	Route::get( 'news', 'News\NewsController@admin_index' )->name( 'admin.news.index' );
	Route::get( 'news/show/{id}', 'News\NewsController@show' )->name('admin.news.show');
	Route::get( 'news/create', 'News\NewsController@create')->name('admin.news.create')->middleware(['permission:news-create']);
	Route::post( 'news/create', 'News\NewsController@store' )->name('admin.news.store')->middleware(['permission:news-create']);
	Route::get( 'news/edit/{id}', 'News\NewsController@edit' )->name( 'admin.news.edit' )->middleware(['permission:news-edit']);
	Route::put( 'news/edit/{id}', 'News\NewsController@update')->name('admin.new.update')->middleware(['permission:news-edit']);
	Route::delete('news/{id}','News\NewsController@destroy')->name('admin.news.destroy')->middleware(['permission:news-delete']);
	Route::get( 'news/search', 'News\NewsController@search' )->name( 'admin.news.search' );
	Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\LfmController@upload');
    

    // TEST DATA TABLE
    Route::get('newsTest','News\NewsController@index2');
    Route::get('newsTest2','News\NewsController@index3')->name('admin.news2.index');

    //END
	//-----------------------------------Admin Book Ticket------------------------------------------

	Route::get( 'bookTicket','BookTicket\BookTicketController@admin_index')->name('admin.listBookTicket.index' );
	Route::get( 'bookTicket/edit/{id}', 'BookTicket\BookTicketController@edit')->name( 'admin.listBookTicket.edit');
	Route::put( 'bookTicket/edit/{id}', 'BookTicket\BookTicketController@update')->name( 'admin.listBookTicket.update');
	Route::get( 'bookTicket/show/{id}', 'BookTicket\BookTicketController@show' )->name( 'admin.listBookTicket.show' );
	Route::delete( 'bookTicket/{id}', 'BookTicket\BookTicketController@destroy' )->name( 'admin.listBookTicket.destroy');
	Route::get( 'bookTicket/search', 'BookTicket\BookTicketController@admin_search' )->name( 'admin.listBookTicket.search' );
	// Route::get( 'bookTicket/find-car', 'BookTicket\BookTicketController@find_car' )->name( 'admin.listBookTicket.find_car');

	//-------------------------------------Admin Place----------------------------------------------

	Route::get( 'place', 'Place\PlaceController@admin_index')->name( 'admin.place.index' );
	Route::get( 'place/create', 'Place\PlaceController@create')->name( 'admin.place.create' );
	Route::post( 'place/create', 'Place\PlaceController@store')->name( 'admin.place.store' );
	Route::get( 'place/edit/{id}', 'Place\PlaceController@edit' )->name( 'admin.place.edit' );
	Route::put( 'place/edit/{id}', 'Place\PlaceController@update' )->name( 'admin.place.update' );
	Route::delete('place/{id}', 'Place\PlaceController@destroy' )->name( 'admin.place.destroy');


	//----------------------------------Admin Car Company-------------------------------------------

	Route::get( 'car_company', 'CarCompany\CarCompanyController@admin_index' )->name( 'admin.car.index' );
	Route::get( 'car_company/create', 'CarCompany\CarCompanyController@create' )->name( 'admin.car.create' );
	Route::post( 'car_company/create', 'CarCompany\CarCompanyController@store' )->name( 'admin.car.store' );
	Route::get( 'car_company/edit/{id}', 'CarCompany\CarCompanyController@edit' )->name( 'admin.car.edit');
	Route::put( 'car_company/edit/{id}', 'CarCompany\CarCompanyController@update' )->name( 'admin.car.update' );
	Route::get( 'car_company/show/{id}', 'CarCompany\CarCompanyController@show' )->name( 'admin.car.show' );
	Route::delete( 'car_company/{id}', 'CarCompany\CarCompanyController@destroy' )->name( 'admin.car;.destroy' );
	Route::get('car_company/check-phone', 'CarCompany\CarCompanyController@validate_phone_request')->name('admin.car.checkphone');
	Route::get('car_company/check-email', 'CarCompany\CarCompanyController@validate_email_request')->name('admin.car.checkemail');
	Route::get( 'car_company/search', 'CarCompany\CarCompanyController@search' )->name( 'admin.car.search' );
	//Dropzone 
	Route::post('car_company/uploadImage','CarCompany\CarCompanyController@uploadImageDz')->name('admin.car.uploadImage');
	Route::get('car_company/getImages','CarCompany\CarCompanyController@getImages')->name('admin.car.getImages');
	Route::post('car_company/removeImage','CarCompany\CarCompanyController@removeImage')->name('admin.car.removeImage');



	//-----------------------------------Admin ViewBlade Content--------------------------------------------

	Route::get( 'viewBlade', 'ViewBlade\ViewBladeController@admin_index' )->name( 'admin.viewBlade.index' );
	Route::get( 'viewBlade/create', 'ViewBlade\ViewBladeController@create' )->name( 'admin.viewBlade.create');
	Route::post( 'viewBlade/create', 'ViewBlade\ViewBladeController@store' )->name( 'admin.viewBlade.store'); 
	Route::get( 'viewBlade/edit/{id}', 'ViewBlade\ViewBladeController@edit' )->name( 'admin.viewBlade.edit' );
	Route::put( 'viewBlade/edit/{id}', 'ViewBlade\ViewBladeController@update' )->name( 'admin.viewBlade.update' );
	Route::get( 'viewBlade/show/{id}', 'ViewBlade\ViewBladeController@show' )->name( 'admin.viewBlade.show');
	Route::delete( 'viewBlade/{id}', 'ViewBlade\ViewBladeController@destroy' )->name( 'admin.viewBlade.destroy' );

	//-----------------------------------Admin ViewBlade Image------------------------------------

	Route::get( 'imgBlade', 'ViewBlade\ImagesBladeController@admin_index')->name( 'admin.imgBlade.index');
	Route::get( 'imgBlade/create', 'ViewBlade\ImagesBladeController@create' )->name( 'admin.imgBlade.create');
	Route::post( 'imgBlade/create', 'ViewBlade\ImagesBladeController@store' )->name( 'admin.imgBlade.store'); 
	Route::get( 'imgBlade/edit/{id}', 'ViewBlade\ImagesBladeController@edit' )->name( 'admin.imgBlade.edit' );
	Route::put( 'imgBlade/edit/{id}', 'ViewBlade\ImagesBladeController@update' )->name( 'admin.imgBlade.update' );
	Route::get( 'imgBlade/show/{id}', 'ViewBlade\ImagesBladeController@show' )->name( 'admin.imgBlade.show');
	Route::delete( 'imgBlade/{id}', 'ViewBlade\ImagesBladeController@destroy' )->name( 'admin.imgBlade.destroy' );


	//--------------------------------------Admin Itinerary ----------------------------------------
	Route::get( 'itinerary', 'Itinerary\ItineraryController@admin_index' )->name( 'admin.itinerary.index');
	Route::get( 'itinerary/create', 'Itinerary\ItineraryController@create' )->name( 'admin.itinerary.create' );
	Route::post( 'itinerary/create', 'Itinerary\ItineraryController@store' )->name( 'admin.itinerary.store');
	Route::post( 'itinerary/create2', 'Itinerary\ItineraryController@store2' )->name( 'admin.itinerary.store2');
	Route::get( 'itinerary/edit/{id}', 'Itinerary\ItineraryController@edit' )->name( 'admin.itinerary.edit' );
	Route::put( 'itinerary/edit/{id}', 'Itinerary\ItineraryController@update' )->name( 'admin.itinerary.update' );
	Route::get( 'itinerary/show/{id}', 'Itinerary\ItineraryController@show' )->name( 'admin.itinerary.show' );
	Route::delete( 'itinerary/{id}', 'Itinerary\ItineraryController@destroy' )->name( 'admin.itinerary.destroy' );
	Route::post('itinerary/{id}','Itinerary\ItineraryController@itinerary_ajax')->name('admin.itinerary');
	Route::post('itiner/{id}','Itinerary\ItineraryController@ajax')->name('admin.ajax');



	//----------------------------------Admin  Ticket Infomation----------------------------------

	Route::get( 'ticket-info', 'TicketInformation\TicketInfomationController@admin_index' )->name( 'admin.ticketInfo.index' );
	Route::get( 'ticket-info/create', 'TicketInformation\TicketInfomationController@create')->name( 'admin.ticketInfo.create');
	Route::post( 'ticket-info/create', 'TicketInformation\TicketInfomationController@store')->name( 'admin.ticketInfo.store');
	Route::get( 'ticket-info/edit/{id}', 'TicketInformation\TicketInfomationController@edit' )->name( 'admin.ticketInfo.edit' );
	Route::put( 'ticket-info/edit/{id}', 'TicketInformation\TicketInfomationController@update')->name( 'admin.ticketInfo.update' );
	Route::delete( 'ticket-info/{id}', 'TicketInformation\TicketInfomationController@destroy' )->name( 'admin.ticketInfo.destroy' );
	Route::get( 'ticket-info/show/{id}', 'TicketInformation\TicketInfomationController@show' )->name( 'admin.ticketInfo.show' );



	Route::get('station','Stations\StationController@admin_index')->name('admin.station.index');
	Route::get('station/create','Stations\StationController@create')->name('admin.stations.create');
	Route::post('station/create','Stations\StationController@store')->name('admin.stations.store');
	Route::delete( 'station/{id}', 'Stations\StationController@destroy' )->name( 'admin.station.destroy' );
	Route::get('station/edit/{id}','Stations\StationController@edit')->name('admin.station.edit');
	Route::post('station/edit/{id}','Stations\StationController@update')->name('admin.station.update');
	Route::get( 'station/show/{id}', 'Stations\StationController@show' )->name( 'admin.station.show' );
	//Dropzone 
	Route::post('station/uploadImage','Stations\StationController@uploadImageDz')->name('admin.station.uploadImage');
	Route::get('station/getImages','Stations\StationController@getImages')->name('admin.station.getImages');
	Route::post('station/removeImage','Stations\StationController@removeImage')->name('admin.station.removeImage');
	Route::get( 'station/search', 'Stations\StationController@search' )->name( 'admin.station.search' );

	Route::get('test/create','Test\TestController@create')->name('admin.test.create');
	Route::post('test/create','Test\TestController@store')->name('admin.test.store');
});

//---------------------------------------END ADMIN-------------------------------------------------

//------------------------------------------USER---------------------------------------------------

//-------------------------------------User Book Ticket--------------------------------------------
Route::get( '/','BookTicket\BookTicketController@create' )->name( 'ticket.create' );
Route::post( 'list','BookTicket\BookTicketController@store' )->name( 'ticket.store' );
Route::get( 'list', 'BookTicket\BookTicketController@list_all' )->name( 'ticket.list');
Route::get( 'checkout/{voice_id}','BookTicket\BookTicketController@getCheckout' )->name( 'ticket.getCheckout' );
Route::post( 'checkout','BookTicket\BookTicketController@postCheckout' )->name( 'ticket.postCheckout' );
Route::get( 'history','BookTicket\BookTicketController@find_history' )->name( 'ticket.find_history' );
Route::post( 'history','BookTicket\BookTicketController@history' )->name( 'ticket.history' );
Route::get('search','BookTicket\BookTicketController@search')->name('ticket.search');
//----------------------------------------User Rate-------------------------------------------------
Route::get( 'bookTicket/rate/{car_id}/{itinerary_id}','BookTicket\BookTicketController@rate' )->name( 'ticket.rate' );
Route::post( 'bookTicket/rate/{car_id?}/{itinerary_id?}','BookTicket\BookTicketController@send_rating' )->name( 'ticket.send_rating');

//----------------------------------------User News-------------------------------------------------
Route::get( 'news','News\NewsController@index' )->name( 'news.index' );
Route::get( 'news/{slug}','News\NewsController@showDetail' )->name( 'news.show' );


//------------------------------------User Check Ticket---------------------------------------------
Route::get( 'checkTicket', 'BookTicket\BookTicketController@checkTicket' )->name( 'ticket.checkTicket');
Route::post( 'checkTicket', 'BookTicket\BookTicketController@checkedTicket' )->name( 'ticket.checkedTicket');


//------------------------------------User Cancel Ticket--------------------------------------------
Route::get( 'cancelTicket', 'BookTicket\BookTicketController@cancelTicket')->name( 'ticket.cancelTicket');
Route::post( 'cancelTicket', 'BookTicket\BookTicketController@canceledTicket')->name( 'ticket.canceledTicket');

//------------------------------------User Car Company----------------------------------------------

Route::get('station/{id}','Stations\StationController@index');


Route::get('car/{id}','CarCompany\CarCompanyController@index')->name( 'car.show');


//--------------Car Company------------------------------------------------
	
// Route::get( 'test', 'ViewBlade\ViewBladeController@index')->name( 'test.index');

//--------------------- stations-----------------------------------------

Route::get('bookTicket/station/{id}','Stations\StationController@index');
Route::post('bookTicket','Stations\StationController@station_post')->name('station.search');

Route::get('abc',function(){
	return view('layouts/trangchu');
});

//-----------------------------------Car Contact---------------------------------------------------
Route::get('contactCar','Contact\ContactController@contact_index')->name('ticket.contact.car');
Route::post('contactCar','Contact\ContactController@contact_post');
Route::get('ajaxSel/{id}','Contact\ContactController@contact_ajax');


//-----------------------------------Contact us--------------------------------------------------
Route::get('contact','Contact\ContactController@create')->name('ticket.contact.us');
Route::post('contact','Contact\ContactController@store')->name('ticket.store.us');

Route::post('/language-chooser', 'Language\LanguageController@changeLanguage');
Route::post('/language/', array('before' => 'csrf', 'as'=>'language-chooser', 'uses' => 'Language\LanguageController@changeLanguage',) );

Route::get('test','Test\TestController@all')->name('test');
