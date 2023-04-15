<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelTest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModelTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model_tests = ModelTest::all();
        return view('admin.model_test.model_test', compact('model_tests'));
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
            'title' => 'required',
            'starting_date_time' => 'required',
            'ending_date_time' => 'required'
        ],[
            'title.required' => 'Title required',
            'starting_date_time' => 'Starting date & time required',
            'ending_date_time' => 'Ending date & time required'
        ]);
        $thumbnail = null;
        if($request->has('thumbnail')){
            $request->validate([
                'thumbnail' => 'image|max:1000'
            ]);
            $thumbnail = $request->file('thumbnail')->store('model_test_thumbnail');

        }

        ModelTest::create([
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'starting_date_time' => $request->starting_date_time,
            'ending_date_time' => $request->ending_date_time,
            'description' => $request->description
        ]);
        Toastr::success('Model Test Created Successfully', 'Success');
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
        $request->validate([
            'title' => 'required',
            'starting_date_time' => 'required',
            'ending_date_time' => 'required'
        ],[
            'title.required' => 'Title required',
            'starting_date_time' => 'Starting date & time required',
            'ending_date_time' => 'Ending date & time required'
        ]);
        $model_test = ModelTest::findOrFail($id);

        $thumbnail = $model_test->thumbnail;
        if($request->has('thumbnail')){
            $request->validate([
                'thumbnail' => 'image|max:1000'
            ]);
            Storage::delete($model_test->thumbnail);
            $thumbnail = $request->file('thumbnail')->store('model_test_thumbnail');

        }

        $model_test->update([
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'starting_date_time' => $request->starting_date_time,
            'ending_date_time' => $request->ending_date_time,
            'description' => $request->description
        ]);
        Toastr::success('Model Test Updated Successfully', 'Success');
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
        $model_test = ModelTest::findOrfail($id);
        // check korte hobe ei e kono proshno ache kina ::: FUTURE;
        Storage::delete($model_test->thumbnail);
        $model_test->delete();
        Toastr::success("Model Test Deleted Successfully", "Success");
        return back();
    }
}
