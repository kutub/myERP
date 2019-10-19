<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stocks;
use App\Sales;
use Carbon\Carbon;

use App\Http\Resources\Card as CardResource;

class PagesController extends Controller {


     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('pages.index');
    }

    public function users(){
        return view('pages.users');
    }

    public function categories(){
        return view('pages.categories');
    }

    public function stocks(){
        return view('pages.stocks');
    }

    public function customers(){
        return view('pages.customers');
    }

    public function createSales(){
        $stocks = Stocks::all();
        return view('pages.createSales')->with('stocks', $stocks);
    }

    public function productList($id){
        $products = Stocks::where('category', $id)->get();
        return CardResource::collection($products);
    }
    public function salesReport(){
        // //one day (today)
        // $date = Carbon::now()->startOfDay;
        // //one month / 30 days
        // $date = Carbon::now()->subDays(30)->startOfDay;

        $todaySales = Sales::whereDate('created_at', Carbon::today())->get();
        $totalsales = Sales::whereDate('created_at', Carbon::today())->get()->sum('total');
        $totalcash = Sales::whereDate('created_at', Carbon::today())->get()->sum('cash');
        $totaldue = Sales::whereDate('created_at', Carbon::today())->get()->sum('due');
        // return $thismonth = Sales::where('created_at', '>=', $date)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('pages.sales.report')->with('sales', $todaySales)->with('total_sale', $totalsales)->with('total_cash', $totalcash)->with('total_due', $totaldue);
    }

}
