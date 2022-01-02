<?php

namespace App\Http\Controllers;

use App\Models\user_type;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function getAllUserType()
    {
        $response =  user_type::all();
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
     * @param  \App\Models\user_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function show(user_type $user_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function edit(user_type $user_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_type $user_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_type  $user_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_type $user_type)
    {
        //
    }
}
