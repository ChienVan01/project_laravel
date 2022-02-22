<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = User::all();
        return response()->json($response, 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request)
    {
        $user = User::Where('id', $request->id)->update([
            'email' => $request->Email,
            'name' => $request->Name,
            'password' => Hash::make($request->Password),
            // 'phone'=> $request->Phone,
            // 'address'=> $request->Address,
            // 'Avatar'=>$request->Avatar,
            // 'UserType_id'=> $request->UserType_id,
            // 'Status'=>$request->Status,
        ]);
        return response()->json($user, 200);
    }
    public function updatePassword(Request $request)
    {


        $user = User::Where('id', $request->id)->first();
        // return response()->json([$request->Password,$user->Password], 200);
        if (is_null($user) || !Hash::check($request->password, $user->Password)) {
            return response()->json('', 401);
        }
        // User::Where('id',$request->id)->update([
        //     'password'=>Hash::make($request->Password),

        // ]);
        return response()->json($user, 200);
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
