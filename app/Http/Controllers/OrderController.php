<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllOrder()
    {
        $response = Order::all();
        return response()->json($response, 200);
    }
    public function getAllOrderStatus()
    {
        $response = OrderStatus::all();
        return response()->json($response, 200);
    }
    public function index()
    {
        $orders = Order::all();
        return view('orders.index',compact('orders'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders =  DetailOrder::where('Order_id', $id)->first();
        return view('orders.detail',compact('orders'));
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
    public function check($id){
        $order = Order::find($id);
        $order->OrderStatus_id = 2;
        $order->save();
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->OrderStatus_id = 3;
        $order->save();
        return redirect('orders');
    }
  
}
