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


//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});





Route::get('/itinerary', 'UserController@index')->name('itinerary');
Route::post('/itinerary', 'UserController@store')->name('save.itineraries');
Route::post('/itineraryEdit/{itineraryId}/{ItineraryItemID}', 'UserController@update')->name('update.itineraries');
Route::delete('/itineraryDelete/{itineraryId}/{ItineraryItemID}', 'UserController@destroy')->name('destroy.itineraries');
Route::get('/quote/{itinerary_reference}', 'UserController@quote')->name('quote');
Route::get('/team-main', 'UserController@TeamMain')->name('team-main');
Route::get('/verify-email', 'UserController@VerifyEmail')->name('verify-email');
Route::get('/profile', 'UserController@Profile')->name('profile');
Route::post('/profile/{id}', 'UserController@StoreProfile')->name('save.profile');

Route::get('/payment', 'UserController@Payment')->name('payment');
Route::post('/payment/{id}', 'UserController@StorePayment')->name('save.payment');
Route::put('/editpayment/{paymentId}', 'UserController@EditPayment')->name('edit.payment');
Route::delete('/deletepayment/{paymentId}', 'UserController@DeletePayment')->name('delete.payment');
Route::get('/passenger', 'UserController@Passenger')->name('passenger');
Route::post('/passenger/{id}', 'UserController@StorePassenger')->name('save.passenger');
Route::post('/editpassenger/{passportId}', 'UserController@EditPassenger')->name('edit.passenger');
Route::delete('/deletepassenger/{passportId}', 'UserController@DeletePassenger')->name('delete.passenger');
Route::get('/timeline', 'UserController@Timeline')->name('timeline');
//Route::get('/itinerary', 'UserController@index')->name('itinerary');
//Route::get('/itinerary', 'UserController@index')->name('itinerary');
//Route::get('/itinerary', 'UserController@index')->name('itinerary');


Auth::routes(['verify' => true]);
//Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function () {

Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('team')->group(function () {

    Route::get('/login', 'Auth\TeamLoginController@showLoginForm')->name('team.login');
    Route::post('/login', 'Auth\TeamLoginController@login')->name('team.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('team.logout');
    Route::get('/', 'TeamController@index')->name('team.dashboard');
    Route::post('/TeamitineraryEdit/{itineraryId}', 'TeamController@update')->name('update.Teamitineraries');




});