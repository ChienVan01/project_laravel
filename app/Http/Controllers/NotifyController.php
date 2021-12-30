<?php

namespace App\Http\Controllers;

use App\Models\notify;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function getAllNotify()
    {
        $response =  notify::all();
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
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function show(notify $notify)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function edit(notify $notify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notify $notify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([notify::destroy($id), 'message' => 'Successfully destroy product']);
    }
}
