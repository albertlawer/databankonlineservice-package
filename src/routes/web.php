<?php 
	
	use Illuminate\Http\Request;

	Route::group(['namespace'=>'Databank\OnlineService\Http\Controllers'], function(){

		Route::get('getusername', 'OnlineServiceController@getusername')->name('getusername');

		Route::post('postusername', 'OnlineServiceController@postusername')->name('postusername');

		Route::get('getlogin', 'OnlineServiceController@getlogin')->name('getlogin');

		Route::post('postlogin', 'OnlineServiceController@postlogin')->name('postlogin');

		Route::get('getcreateuser', 'OnlineServiceController@getcreateuser')->name('getcreateuser');

		Route::post('postcreateuser', 'OnlineServiceController@postcreateuser')->name('postcreateuser');

		Route::get('getupdate', 'OnlineServiceController@getupdate')->name('getupdate');

		Route::post('postupdate', 'OnlineServiceController@postupdate')->name('postupdate');

		Route::get('getchangepassword', 'OnlineServiceController@getchangepassword')->name('getchangepassword');

		Route::post('postchangepassword', 'OnlineServiceController@postchangepassword')->name('postchangepassword');

	});

