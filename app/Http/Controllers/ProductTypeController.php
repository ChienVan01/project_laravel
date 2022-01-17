<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{

    public function getAllProductType()
    {
        $response =  ProductType::all();
        return response()->json($response, 200);
    }
    public function getAllDetailProductType($id)
    {
        $response =  Product::where('ProductType_id', '=', $id)->get();
        return response()->json($response, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $ProductType =  ProductType::all();
        return view('product_types.index',compact('ProductType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //chua lam 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $ProductType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail =  Product::where('ProductType_id', '=', $id)->get();
        return view('product_types.detail',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $ProductType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $ProductType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $ProductType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $ProductType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $ProductType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_type = ProductType::find($id);
        $product_type->Status = 0;
        $product_type->save();
        return redirect('/product_types');
    }
}
