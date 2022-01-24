<?php

namespace App\Http\Controllers;

use App\Models\notify;
use App\Models\User;
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
        $users = User::all();
        $notifies = notify::all();
        return view('notifies.index', compact('notifies','users'));
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
    public function edit($id)
    {
        $notify = notify::find($id);
        return view('notifies.edit',compact('notify'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $notify = notify::Where('id',$request->id)->update([
            'Name'=> $request->Name,
            'Content'=>$request->Content,         
            'Status'=>$request->Status,
         ]);
      
         return redirect('notifies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notify = notify::find($id);
        $notify->Status = 0;
        $notify->save();
        return redirect('notifies');
    }
    public function restore($id)
    {
        $notify = notify::find($id);
        $notify->Status = 1;
        $notify->save();
        return redirect('notifies');
    }
}
