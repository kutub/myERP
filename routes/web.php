<?php
// use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Stocks;
use App\categories;
use App\Company;
use App\Http\Resources\Category as CategoryResource;


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

Route::get('/', 'PagesController@index');
Route::get('/users', 'PagesController@users');
Route::get('/stocks', 'PagesController@stocks');
Route::get('/customers', 'PagesController@customers');
Route::get('/create-sales', 'PagesController@createSales');
Route::get('/sales-report', 'PagesController@salesReport');

Route::resource('categories', 'CategoriesController');
Route::resource('stocks', 'StocksController');
Route::get('/manage-stocks', function () {
    return view('pages.stocks.manageStocks');
});

Route::resource('customers', 'CustomersController');

Route::get('/companies', function(){
    return view('pages.company.list');
});
Route::get('/companies/{company}', 'CompanyController@show');

Route::get('/credited', 'CreditController@index');

Route::get('/category-list', function () {
    $categories = categories::all();
    return CategoryResource::collection($categories);
});
Route::get('/product-list/{id}', 'PagesController@productList');

Route::get('/invoice/{id}', function () {
    return view('pages.invoice');
});
Route::get('/memo/{id}', function () {
    return view('pages.memo');
});


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
