<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use App\Http\Resources\Orders as OrdersResource;


class OrdersApiController extends Controller
{
    //   /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $orders = Orders::where('invoice', $id)->get();
        return OrdersResource::collection($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $order = new Orders();
        $order->customers_id = $request->input('customer_id');
        $order->product_name = $request->input('name');
        $order->quantity = $request->input('quantity');
        $order->taotal_price = $request->input('total_price');
        $order->invoice = $request->input('invoice');
        $order->cash = $request->input('cash');
        $order->due = $request->input('due');
        $order->transport = $request->input('transport');
        $order->created_by = 'emon';
        
        if($order->save()){
            return new OrdersResource($order);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
