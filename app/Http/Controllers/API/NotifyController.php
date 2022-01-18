<?php

namespace App\Http\Controllers\API;

use App\Models\notify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function getAllNotify($id)
    {
        $response =  notify::where('User_id', $id)->get();
        return response()->json($response, 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userid, $id)
    {
        // $response = notify::where('User_id','=', $userid)::where('id', $id);
        // $notify = notify::find($response['id']);
        // $notify->Status = 0;
        // $notify->save();

        // return response()->json($response, 200);
    }
}
