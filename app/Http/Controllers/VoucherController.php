<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\User;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function getAllVoucher()
    {
        $response =  Voucher::all();
        return response()->json($response, 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::all();
        $users = User::all();
        return view('vouchers.index', compact('vouchers', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vouchers.create');
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
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        $detail = Voucher::find($id);
        return view('vouchers.detail',compact('voucher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voucher = Voucher::find($id);
        return view('vouchers.edit',compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $voucher = Voucher::Where('id',$request->id)->update([
            'Name'=> $request->Name,
            'EXD'=>$request->EXD,
            'Content'=>$request->Content,
            'Quantity'=>$request->Quantity,            
            'Status'=>$request->Status,
         ]);
      
         return redirect('vouchers');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        $voucher->Status = 0;
        $voucher->save();
        return redirect('vouchers');
    }

    public function restore($id)
    {
        $voucher = Voucher::find($id);
        $voucher->Status = 1;
        $voucher->save();
        return redirect('vouchers');
    }
}
