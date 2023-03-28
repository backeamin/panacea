<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
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
    public function store(Request $request){
            $request->validate([
                'category_name' => 'required'
            ],[
                'category_name.required' => 'Category name required'
            ]);
       $icon = null;
      if($request->has('icon')){
          $request->validate([
              'icon' => 'image|max:1000'
           ]);
          $icon = $request->file('icon')->store('category_icon');

      }

      Category::create([
          'category_name' => $request->category_name,
          'icon' => $icon
      ]);
        Toastr::success('Category Created Successfully', 'Success');
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
            'category_name' => 'required'
        ],[
            'category_name.required' => 'Category name required'
        ]);
        $category = Category::findOrFail($id);

        $icon = $category->icon;
        if($request->has('icon')){
            $request->validate([
                'icon' => 'image|max:1000'
            ]);
            Storage::delete($category->icon);
            $icon = $request->file('icon')->store('category_icon');

        }

        $category->update([
            'category_name' => $request->category_name,
            'icon' => $icon
        ]);
        Toastr::success('Category Updated Successfully', 'Success');
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
        $category = Category::where('id', $id)->with('products')->firstOrFail();

        // check korte hobe ei category te kono book ache kina ::: FUTURE;
        if ($category->id == 1){
            Toastr::error("Uncategorized can't be Delete!", "Sorry");
            return back();
        }
        if (count($category->products) > 0) {
            $product_array = [];
            foreach ($category->products as $single_product) {
                if (count($single_product->categories) > 1){
                    continue;
                }
                $product_array[] = $single_product->id;
            }
            $uncategorized = Category::find(1);
            $uncategorized->products()->syncWithoutDetaching($product_array);
        }

        $category->products()->detach();
        Storage::delete($category->icon);
        $category->delete();
        Toastr::success("Category Deleted Successfully", "Success");
        return back();

    }
}
