<?php

namespace App\Http\Controllers;

use App\ManageStocks;
use Illuminate\Http\Request;
use App\Http\Resources\ManageStocks as newStockResource;

class ManageStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newStock = ManageStocks::all();
        return newStockResource::collection($newStock);
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
        $newStock = new ManageStocks();

        $newStock->catagory_id = $request->catagory_id;
        $newStock->product_id = $request->product_id;
        $newStock->detail  = $request->detail;
        $newStock->quantity = $request->quantity;
        $newStock->unit_price = $request->unit_price;
        $newStock->truck_no = $request->truck_no;
        $newStock->transport = $request->transport;
        $newStock->created_by = $request->created_by;
        $newStock->updated_by = $request->updated_by;
        $newStock->total_value = $request->total_value;
        $newStock->sent_to = $request->sent_to;
        $newStock->company_id = $request->company_id;
        if($newStock->save()){
            return new newStockResource($newStock);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManageStocks  $manageStocks
     * @return \Illuminate\Http\Response
     */
    public function show(ManageStocks $manageStocks, $id)
    {
        $chalan = ManageStocks::where('company_id', $id)->get();
        return newStockResource::collection($chalan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManageStocks  $manageStocks
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageStocks $manageStocks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManageStocks  $manageStocks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManageStocks $manageStocks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManageStocks  $manageStocks
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageStocks $manageStocks)
    {
        //
    }
}
