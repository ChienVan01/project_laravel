<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $response = Product::where('status', '=', 1)->get();
        // return response()->json($response, 200);
        $products =  Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'name'=> 'required',
            'Info'=> 'required',
            'Price'=> 'required',
            'Quantity'=> 'required',
            'Avatar'=>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Status'=> 'required',
            'Origin'=> 'required',
        ]);
        $input = $request->all();
        // if ($image = $request->file('Avatar')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
        dd($input);
        // Product::create($input);
        // return redirect('products.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Product::find($id);
        return view('products.detail',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {  
       $product = Product::Where('id',$request->id)->update([
           'Name'=> $request->Name,
           'Status'=>$request->Status,
           'Price'=>$request->Price,
        ]);
     
        return redirect('products');
        
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->Status = 0;
        $product->save();
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Product::Where('Name', 'like','%'.$name.'%')->get();
    }
}
