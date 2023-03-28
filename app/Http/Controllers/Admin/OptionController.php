<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.option.option');
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
        $options = Option::all();

        foreach ($options as $option){
            $field_name = $option->title;
            if($option->id == 4 || $option->id == 5){
                $this->uploadImage($option, $request);
                continue;
            }
            $option->update([
                'value' => $request->$field_name
            ]);
        }

        Toastr::success('Options Updated Successfully', 'Success');
        return back();
    }
// Image Upload Extra Function

    public function uploadImage($option, $request)
    {
        if($option->title == 'logo'){
            if($request->has('logo')){
                $request->validate([
                    'logo' => 'image|max:100'
                ]);
                Storage::delete($option->value);
                $logo = $request->file('logo')->store('options');
                $option->update([
                    'value' => $logo
                ]);
            }
        }


        if($option->title == 'favicon'){
            if($request->has('favicon')){
                $request->validate([
                    'favicon' => 'image|max:20'
                ]);
                Storage::delete($option->value);
                $favicon = $request->file('favicon')->store('options');
                $option->update([
                    'value' => $favicon
                ]);
            }
        }
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
        //
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
