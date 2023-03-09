<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.product', compact('products'));
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
            'price' => 'required',
            'writer_id' => 'required|numeric',
        ],[
            'title.required' => 'Product Title required',
            'price.required' => 'Price required',
            'writer_id.required' => 'Writer Name required',
        ]);
        $cover_page = null;
        if($request->has('cover_page')){
            $request->validate([
                'cover_page' => 'image'
            ]);
            $cover_page = $request->file('cover_page')->store('product_cover_page');
        }
            $publishing_year = null;
        if ($request->has('publishing_year')){
            $request->validate([
                'publishing_year' => 'nullable|numeric'
            ],[
                'publishing_year.numeric' => 'Publishing Year Must be Number'
            ]);
            $publishing_year = $request->publishing_year;
        }

        Product::create([
            'title' => $request->title,
            'cover_page' => $cover_page,
            'writer_id' => $request->writer_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'publishing_year' => $publishing_year,
            'edition' => $request->edition,
            'details' => $request->details,
        ]);
        Toastr::success('Product Created Successfully', 'Success');
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
            'price' => 'required',
            'writer_id' => 'required|numeric',
        ],[
            'title.required' => 'Product Title required',
            'price.required' => 'Price required',
        ]);
        $product = Product::findOrFail($id);

        $cover_page = $product->cover_page;
        if($request->has('cover_page')){
            $request->validate([
                'cover_page' => 'image'
            ]);
            Storage::delete($product->cover_page);
            $cover_page = $request->file('cover_page')->store('product_cover_page');

        }
        $publishing_year = $product->publishing_year;
        if ($request->has('publishing_year')){
            $request->validate([
                'publishing_year' => 'nullable|numeric'
            ],[
                'publishing_year.numeric' => 'Publishing Year Must be Number'
            ]);
            $publishing_year = $request->publishing_year;
        }

        $product->update([
            'title' => $request->title,
            'cover_page' => $cover_page,
            'writer_id' => $request->writer_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'publishing_year' => $publishing_year,
            'edition' => $request->edition,
            'details' => $request->details,
        ]);
        Toastr::success('Product Updated Successfully', 'Success');
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
        $product = Product::findOrfail($id);
        Storage::delete($product->cover_page);
        $product->delete();
        Toastr::success("Product Deleted Successfully", "Success");
        return back();
    }
}
