<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $ProductType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $ProductType)
    {
        //
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
    public function destroy(ProductType $ProductType)
    {
        //
    }
}
