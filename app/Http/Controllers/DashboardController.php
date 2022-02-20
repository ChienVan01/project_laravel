<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
        $products= Product::count('id');
        $users = User::all();
        $orders = DB::table('orders')
        ->join('users', 'orders.User_id', '=', 'users.id')
        ->select('orders.*',  'orders.TotalPrice','users.Name')
        ->get();
        // dd($orders);
        $product_type = ProductType::count('id');
        return view('index',compact('products','users','orders','product_type'));
        

        
    }
}
