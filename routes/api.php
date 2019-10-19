<?php

use App\Http\Controllers\StocksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('apistocks', 'StocksApiController@index');
Route::get('apistock/{id}', 'StocksController@show');
Route::post('apistock/{id}', 'StocksController@store');
Route::put('stockUpdate/{id}', 'StocksApiController@update');
Route::delete('apistock/{id}', 'StocksController@destroy');

Route::apiResource('/manage-stocks', 'ManageStocksController');

Route::apiResource('/companies', 'CompanyController');


Route::get('customers', 'CustomersApiController@index');
Route::get('customerAddress/{id}', 'CustomersApiController@show');

Route::post('add-sales', 'SalesApiController@store');
Route::post('credited', 'CreditApiController@store');
Route::post('orders', 'OrdersApiController@store');

Route::get('sales_by_customer/{id}', 'SalesApiController@show');
Route::get('credit_by_customer/{id}','CreditApiController@show');
Route::get('invoice/{id}','OrdersApiController@index');

