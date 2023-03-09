<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.slider', compact('sliders'));
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
            'image' => 'required'
        ],[
            'image.required' => 'Image required'
        ]);
        $image = null;
        if($request->has('image')){
            $request->validate([
                'image' => 'image|max:1000'
            ]);
            $image = $request->file('image')->store('slider_image');

        }

        Slider::create([
            'title' => $request->title,
            'image' => $image
        ]);
        Toastr::success('Slider Created Successfully', 'Success');
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
        $slider = Slider::findOrFail($id);
        $image = $slider->image;
        if($request->has('image')){
            $request->validate([
                'image' => 'image|max:1000'
            ]);
            $image = $request->file('image')->store('slider_image');

        }

        $slider->update([
            'title' => $request->title,
            'image' => $image
        ]);
        Toastr::success('Slider Updated Successfully', 'Success');
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
        $slider = Slider::findOrfail($id);
        // check korte hobe ei category te kono book ache kina ::: FUTURE;
        Storage::delete($slider->icon);
        $slider->delete();
        Toastr::success("Slider Deleted Successfully", "Success");
        return back();
    }
}
