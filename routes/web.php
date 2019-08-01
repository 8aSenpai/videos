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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('register/verify/{token}', 'Auth\RegisterController@verify');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('mi_cuenta', 'EditaccountController@view');
Route::post('mi_cuenta', 'EditaccountController@editar');
Route::get('subir', 'SubirController@view'); 
Route::post('subir', 'SubirController@editar');
Route::get('/video/watch={id}', 'VideosController@ver')->name('video'); 
Route::get('buy_premium', 'BuypremiumController@view')->name('buy_premium'); 

// Paypal
// Enviamos nuestro pedido a PayPal
Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));
// Después de realizar el pago Paypal redirecciona a esta ruta
Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));

Route::get('pay', 'PayController@view')->name('pay'); 
Route::post('pay', 'PayController@process')->name('pay'); 
Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
); 