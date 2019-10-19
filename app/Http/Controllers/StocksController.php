<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Stocks;
use App\Http\Resources\Card as CardResource;
use App\categories;

class StocksController extends Controller
{
    // /**
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
    public function index()
    {
        $stocks = Stocks::all();
        return view('pages.stocks.stocks')->with('stocks', $stocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::pluck('Category', 'id')->all();
        return view('pages.stocks.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'description' => 'required',
            'buying_price' => 'required',
            'stock' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        //handle File Upload
        if($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
           
            //get file
            $file = $request->file('image');
            //upload Image 
            $file->move('uploads/product_images/', $fileNameToStore);
            // $path = $request->file('image')->move('/product_image', $fileNameToStore);


        }else{
            $fileNameToStore = 'anonymous.png';
        }

        $stocks = new Stocks();
        $stocks->image = $fileNameToStore;
        $stocks->category = $request->input('category');
        $stocks->code = $request->input('code');
        $stocks->description = $request->input('description');
        $stocks->stock = $request->input('stock');
        $stocks->buying_price = $request->input('buying_price');
        $stocks->selling_price = $request->input('selling_price');
        $stocks->created_by = 'emon';
        $stocks->save();

        return redirect('/stocks')->with('success', 'New Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stocks::findOrFail($id);
        return new CardResource($stock);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stocks::find($id);
        return view('pages.stocks.edit')->with('stock', $stock);
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
        $this->validate($request, [
            'category' => 'required',
            'description' => 'required',
            'buying_price' => 'required',
            'stock' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        $stocks = Stocks::find($id);

         //handle File Upload
         if($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //get file
            $file = $request->file('image');
            //upload Image 
            $file->move('uploads/product_images/', $fileNameToStore);
            // $path = $request->file('image')->move('/product_image', $fileNameToStore);

        }else{
            $fileNameToStore =  $stocks->image;
        }

        $stocks->image = $fileNameToStore;
        $stocks->category = $request->input('category');
        $stocks->code = $request->input('code');
        $stocks->description = $request->input('description');
        $stocks->stock = $request->input('stock');
        $stocks->buying_price = $request->input('buying_price');
        $stocks->selling_price = $request->input('selling_price');
        $stocks->created_by = 'emon';
        $stocks->save();

        return redirect('/stocks')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stocks::find($id);
        $stock->delete();
        return redirect('/stocks')->with('success', 'Product Removed');
    }
}
