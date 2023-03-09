<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookShop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_shops = BookShop::all();
        return view('admin.book_shop.book_shop', compact('book_shops'));
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
            'shop_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ],[
            'shop_name.required' => 'Category name required',
            'phone_number.required' => 'Phone number required',
            'address.required' => 'Address required',
        ]);
        $logo = null;
        if($request->has('logo')){
            $request->validate([
                'logo' => 'image|max:1000'
            ]);
            $logo = $request->file('logo')->store('book_shop_logo');

        }

        BookShop::create([
            'shop_name' => $request->shop_name,
            'logo' => $logo,
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);
        Toastr::success('Shop Created Successfully', 'Success');
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
            'shop_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ],[
            'shop_name.required' => 'Category name required',
            'phone_number.required' => 'Phone number required',
            'address.required' => 'Address required',
        ]);
        $book_shop = BookShop::findOrFail($id);
        $logo = null;
        if($request->has('logo')){
            $request->validate([
                'logo' => 'image|max:1000'
            ]);
            $logo = $request->file('logo')->store('book_shop_logo');

        }

        $book_shop->update([
            'shop_name' => $request->shop_name,
            'logo' => $logo,
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);
        Toastr::success('Shop Created Successfully', 'Success');
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
        $book_shop = BookShop::findOrfail($id);
        // check korte hobe ei category te kono book ache kina ::: FUTURE;
        Storage::delete($book_shop->logo);
        $book_shop->delete();
        Toastr::success("Shop Deleted Successfully", "Success");
        return back();
    }
}
