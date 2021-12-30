<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
        // //dd(Auth::guard());
        // $data = session()->all();
       
        // if (session()->exists('user')) {
        //     //  dd($data);
        //     return view('index');
        // }else{
        //     // return response()->json([
        //     //     'message' => 'No data in the session'
        //     // ]);
      
        // }
          return view('index');
    }
}
