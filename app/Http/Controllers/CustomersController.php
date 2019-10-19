<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class CustomersController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all();
        return view('pages.customers.customers')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customers.create');
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
            'name' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'area' => 'required',
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
            $file->move('uploads/customer_images/', $fileNameToStore);
            // $path = $request->file('image')->move('/product_image', $fileNameToStore);

        }else{
            $fileNameToStore = 'anonymous.png';
        }

        $customers = new Customers();
        $customers->image = $fileNameToStore;
        $customers->name = $request->input('name');
        $customers->phone = $request->input('phone');
        $customers->status = $request->input('status');
        $customers->area = $request->input('area');
        $customers->description = 'No Commant';
        $customers->amount = 0;
        $customers->created_by = 'emon';
        $customers->save();

        return redirect('/customers')->with('success', 'New Customer Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customers::find($id);
        return view('pages.customers.profile')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customers::find($id);
        return view('pages.customers.edit')->with('customer', $customer);
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
            'name' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'area' => 'required',
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
            $file->move('uploads/customer_images/', $fileNameToStore);
            // $path = $request->file('image')->move('/product_image', $fileNameToStore);

        }else{
            $fileNameToStore = 'anonymous.png';
        }

        $customers = Customers::find($id);
        $customers->image = $fileNameToStore;
        $customers->name = $request->input('name');
        $customers->phone = $request->input('phone');
        $customers->status = $request->input('status');
        $customers->area = $request->input('area');
        $customers->description = 'No Commant';
        $customers->amount = 0;
        $customers->created_by = 'emon';
        $customers->save();

        return redirect('/customers')->with('success', 'Customer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers::find($id);
        $customer->delete();
        return redirect('/customers')->with('success', 'Customer Removed');
    }
}
