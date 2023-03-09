<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = Writer::all();
        return view('admin.writer.writer', compact('writers'));
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
            'designation' => 'required'
        ],[
            'name.required' => 'Writer name required',
            'designation.required' => 'Designation required'
        ]);
        $profile_picture = null;
        if($request->has('profile_picture')){
            $request->validate([
                'profile_picture' => 'image|max:10000'
            ]);
            $profile_picture = $request->file('profile_picture')->store('writer_profile_picture');

        }

       Writer::create([
           'name' => $request->name,
           'profile_picture' => $profile_picture,
           'designation' => $request->designation,
           'description' => $request->description,
           'writer_speech' => $request->writer_speech,
       ]);

        Toastr::success('Writer Created Successfully', 'Success');
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
        $writer = Writer::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'designation' => 'required'
        ],[
            'name.required' => 'Writer name required',
            'designation.required' => 'Designation required'
        ]);
        $profile_picture = $writer->profile_picture;
        if($request->has('profile_picture')){
            $request->validate([
                'profile_picture' => 'image|max:10000'
            ]);
            Storage::delete($writer->profile_picture);
            $profile_picture = $request->file('profile_picture')->store('writer_profile_picture');

        }

        $writer->update([
            'name' => $request->name,
            'profile_picture' => $profile_picture,
            'designation' => $request->designation,
            'description' => $request->description,
            'writer_speech' => $request->writer_speech,
        ]);

        Toastr::success('Writer Updated Successfully', 'Success');
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
        $writer = Writer::findOrFail($id);
        // check korte hobe ei writer er kono bok ache kina FUTURE!
        Storage::delete($writer->profile_picture);
        $writer->delete();
        Toastr::success('Writer Deleted Successfully', 'Success');
        return back();
    }
}
