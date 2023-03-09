<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('admin.message.message', compact('messages'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ],[
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'message.required' => 'Message required'
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        Toastr::success('Message Send Successfully', 'Success');
        return back();
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
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ],[
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'message.required' => 'Message required'
        ]);

        $message->update([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        Toastr::success('Message Updated Successfully', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::findOrfail($id);
        $message->delete();
        Toastr::success("Message Deleted Successfully", "Success");
        return back();
    }
}
