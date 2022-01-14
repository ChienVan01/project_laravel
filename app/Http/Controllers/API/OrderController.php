<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $response = Order::all();
    return response()->json($response, 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public static function checkQuantity($id, $Quantity)
  {
    $product = Product::find($id);
    if ($product->Quantity < $Quantity) {
      return false;
    } else {
      $amount = $product->Quantity - $Quantity;
      $product->Quantity = $amount;
      $product->save();
      return true;
    }
  }

  public function store(Request $request)
  {

    $data = $request->validate([
      'Payment_id' => 'required',
      'User_id' => 'required',
      'Voucher_id' => 'required',
      'OrderStatus_id' => 'required',
      'TotalPrice' => 'required',
    ]);


    $order = Order::create([
      'Payment_id' => $data['Payment_id'],
      'User_id' => $data['User_id'],
      'Voucher_id' => $data['Voucher_id'],
      'OrderStatus_id' => $data['OrderStatus_id'],
      // 'TimeBuy' => $request->OrderStatus_id,
      'TotalPrice' => $data['TotalPrice'],
    ]);


    $line_items = ($request->line_items);


    foreach ($line_items as $item) {
      $check = OrderController::checkQuantity($item['id'], $item['Quantity']);
      if ($check) {
        $orderDetail = DetailOrder::create([
          'Order_id' => $order->id,
          'Product_id' => $item['id'],
          'UnitPrice' => $item['Price'],
          'Quantity' => $item['Quantity'],
          'IntoMoney' => $item['Quantity'] * $item['Price'],
        ]);
      } else {
        return response(['message' => 'them ko thanh cong'], 400);
      }
    }

    return response($order, 201);
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
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request,)
  {
    // dd($request->id);
    $order = Order::Where('id', $request->id)->update([
      // 'Email'=> $request->Email,
      'OrderStatus_id' => $request->OrderStatus_id,
      // 'password'=>Hash::make($request->Password),
      // 'phone'=> $request->Phone,
      // 'address'=> $request->Address,
      // 'Avatar'=>$request->Avatar,
      // 'UserType_id'=> $request->UserType_id,
      // 'Status'=>$request->Status,
    ]);




    return response()->json($order, 200);
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
