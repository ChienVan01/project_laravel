<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
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
        $products = Product::paginate(15);

        //$products =  Product::paginate(15);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_types = ProductType::all();
        return view('products.create', compact('product_types'));
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
            'Name' => 'required',
            'Info' => 'required',
            'Origin' => 'required',
            'ProductType_id' => 'required',
            'Quantity' => 'required',
            'Price' => 'required',
            // 'Avatar'=>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Status' => 'required',
        ]);
        // $nameImage = $request->Avatar->store('images','public');
        // $product = new Product();
        // $product->id=$request->id;
        // $product->Name = $request->Name;
        // $product->Info = $request->Info;
        // $product->Origin = $request->Origin;
        // $product->ProductType_id = $request->ProductType_id;
        // $product->Quantity = $request->Quantity;
        // $product->Price = $request->Price;
        // $product->Avatar = $request->Avatar;
        // $product->Status = $request->Status;


        $input = $request->all();
        if ($image = $request->file('Avatar')) {
            $destinationPath = 'assets/images/product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['Avatar'] = "$profileImage";
        }
        $product = new Product();
        $product->create($input);
        return redirect('products')->with('success', 'Product created successfully.');
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
        return view('products.detail', compact('detail'));
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
        return view('products.edit', compact('product'));
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
        $product = Product::Where('id', $request->id)->update([
            'Name' => $request->Name,
            'Status' => $request->Status,
            'Price' => $request->Price,
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
    public function restore($id)
    {
        $product = Product::find($id);
        $product->Status = 1;
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
        return Product::Where('Name', 'like', '%' . $name . '%')->get();
    }
}
