<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.review', compact('reviews'));
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
            'ratings' => 'nullable|numeric',
        ],[
            'name.required' => 'Name is required',
            'ratings.numeric' => 'Ratings Must be Number'
        ]);
        $image = null;
        if($request->has('image')){
            $request->validate([
                'image' => 'image|max:1000'
            ]);
            $image = $request->file('image')->store('review_image');

        }

        Review::create([
            'name' => $request->name,
            'image' => $image,
            'date' => $request->date,
            'review' => $request->review,
            'ratings' => $request->ratings,
            'video_link' => $request->video_link,
            'type' => $request->type

        ]);
        Toastr::success('Review Created Successfully', 'Success');
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
            'name' => 'required'
        ],[
            'name.required' => 'Name is required'
        ]);
        $review = Review::findOrFail($id);
        $image = $review->image;
        if($request->has('image')){
            $request->validate([
                'image' => 'image|max:1000'
            ]);
            Storage::delete($review->image);
            $image = $request->file('image')->store('review_image');

        }

        $review->update([
            'name' => $request->name,
            'image' => $image,
            'date' => $request->date,
            'review' => $request->review,
            'ratings' => $request->ratings,
            'video_link' => $request->video_link,
            'type' => $request->type

        ]);
        Toastr::success('Review Updated Successfully', 'Success');
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
        $review = Review::findOrfail($id);
        // check korte hobe ei category te kono book ache kina ::: FUTURE;
        Storage::delete($review->icon);
        $review->delete();
        Toastr::success("Review Deleted Successfully", "Success");
        return back();
    }
}
