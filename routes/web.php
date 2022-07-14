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

Route::get('/', function () {
	return view('homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'murid','as'=>'murid.'],function(){
	Route::get('/dashboard','HomeController@indexMurid')->name('index');
	Route::get('/detail/{id}','HomeController@detailOrderMurid')->name('detail');
	Route::get('/les/offline/order','HomeController@createOffline')->name('createOffline');
	Route::post('/les/offline/order','HomeController@createOfflinePost')->name('createOfflinePost');
	Route::post('/les/offline/finish','HomeController@createOfflineFinished')->name('createOfflineFinished');	
	Route::get('/les/online/order','HomeController@createOnline')->name('createOnline');
	Route::post('/les/online/order','HomeController@createOnlinePost')->name('createOnlinePost');
	
	Route::get('/les/materi/search','HomeController@searchMateri')->name('searchMateri');
	Route::post('/les/materi/search','HomeController@searchMateriPost')->name('searchMateriPost');
	Route::get('/materi/{id}','HomeController@materi')->name('materi');
	Route::get('/materi/{id}/sertifikat','HomeController@printSertifikat')->name('printSertifikat');
	Route::get('/task','HomeController@taskMurid')->name('taskMurid');
	Route::get('/settings','HomeController@settingsMurid')->name('settingsMurid');
	Route::get('/deposit','HomeController@depositMurid')->name('depositMurid');
	Route::post('/deposit','HomeController@depositMuridAction')->name('depositMuridAction');
	Route::get('/profile','HomeController@profileMurid')->name('profileMurid');
	Route::get('/isiprofile','HomeController@isiProfileMurid')->name('isiProfileMurid');
	Route::post('/isiprofile','HomeController@isiProfileMuridAction')->name('isiProfileMuridAction');
	Route::get('/updateprofile/{id}','HomeController@updateProfileMurid')->name('updateProfileMurid');
	Route::post('/updateprofile','HomeController@updateProfileMuridAction')->name('updateProfileMuridAction');
	Route::post('/buyvideo','MyVideosController@buyVideo')->name('buyVideo');
});


Route::group(['prefix'=>'guru','as'=>'guru.'],function(){
	Route::get('/dashboard','HomeController@indexGuru')->name('index');
	Route::get('/les/offline/order','HomeController@searchOffline')->name('searchOffline');
	Route::get('/les/offline/order/{id}','HomeController@searchOfflineDetail')->name('searchOfflineDetail');
	Route::post('/les/offline/order','HomeController@searchOfflineAction')->name('searchOfflineTake');
	Route::post('/les/offline/filter','HomeController@searchOfflineFilter')->name('searchOfflineFilter');
	Route::post('/les/offline/proses','HomeController@searchOfflineProcess')->name('searchOfflineProses');
	Route::post('/les/offline/finish','HomeController@searchOfflineFinished')->name('searchOfflineFinished');
	
	Route::get('/les/online/order','HomeController@searchOnline')->name('searchOnline');
	Route::get('/les/online/order/{id}','HomeController@searchOnlineDetail')->name('searchOnlineDetail');
	
	Route::get('/les/materi/create','HomeController@createMateri')->name('createMateri');
	Route::post('/les/materi/create','HomeController@createMateriPost')->name('createMateriPost');
	Route::get('/task','HomeController@taskGuru')->name('taskGuru');
	Route::get('/settings','HomeController@settingsGuru')->name('settingsGuru');
	Route::get('/withdraw','HomeController@withdrawGuru')->name('withdrawGuru');
	Route::post('/withdraw','HomeController@withdrawGuruAction')->name('withdrawGuruAction');
	Route::get('/profile','HomeController@profileGuru')->name('profileGuru');
	Route::get('/isiprofile','HomeController@isiProfileGuru')->name('isiProfileGuru');
	Route::post('/isiprofile','HomeController@isiProfileGuruAction')->name('isiProfileGuruAction');
	Route::get('/updateprofile/{id}','HomeController@updateProfileGuru')->name('updateProfileGuru');
	Route::post('/updateprofile','HomeController@updateProfileGuruAction')->name('updateProfileGuruAction');
});

Route::get('/guru/room', "VideoRoomController@indexGuru")->name('guru.room.index');
Route::get('/murid/room', "VideoRoomController@indexMurid")->name('murid.room.index');
Route::get('/room/join/{roomName}', 'VideoRoomController@joinRoom')->name('group.room.join');
Route::post('/guru/room/create', 'VideoRoomController@createRoom')->name('guru.room.create');
Route::post('/murid/room/join', 'VideoRoomController@joinRoomMurid')->name('murid.room.join');