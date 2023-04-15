@extends('layouts.admin_layout')
@section('page_title')
    @if($request->type == 'edit')
        Update Product
    @else
        Add New Product
    @endif
@endsection
@section('css')
    <link href="{{asset('admin')}}/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin')}}/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin')}}/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
    @endsection

@section('js')
    <!-- Plugins js -->
    <script src="{{asset('admin')}}/libs/quill/quill.min.js"></script>

    <!-- Init js-->
    <script src="{{asset('admin')}}/js/pages/form-quilljs.init.js"></script>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">
                                @if($request->type == 'edit')
                                    Update Product
                                @else
                                    Create Product
                                @endif
                            </h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('product.index')}}" class="btn btn-primary"><i class="fe-list"></i> View All Product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($request->type == 'edit')
                        <form class="form-horizontal" action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                    @else
                        <form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input value="{{$request->type == 'edit' ? $product->title : ''}}" class="form-control" type="text" name="title" id="title" placeholder="Product Title">
                                </div>
                                <div class="form-group">
                                        <label for="cover_page">Cover Page</label>
                                        <input class="form-control" name="cover_page" type="file" id="cover_page">
                                </div>
                                <div class="form-group">
                                        <label for="writer_id">Select Writer</label>
                                        <Select id="writer_id" name="writer_id" class="form-control">
                                            <option disabled selected>Select a Writer</option>
                                            @foreach($writers as $writer)
                                                <option {{$request->type == 'edit' ? ($product->writer_id == $writer->id ? 'selected' : ''): ''}} value="{{$writer->id}}">{{$writer->name}}</option>
                                            @endforeach
                                        </Select>
                                </div>
                                <div class="form-group">
                                        <label for="price">Price</label>
                                        <input value="{{$request->type == 'edit' ? $product->price : ''}}" class="form-control" type="number" name="price" id="price" placeholder="Price">
                                </div>
                                <div class="form-group">
                                        <label for="discount_price">Discount Price</label>
                                        <input value="{{$request->type == 'edit' ? $product->discount_price : ''}}" class="form-control" type="number" name="discount_price" id="discount_price" placeholder="Discount Price">
                                </div>
                                <div class="form-group">
                                        <label for="publishing_year">Publishing Year</label>
                                        <input value="{{$request->type == 'edit' ? $product->publishing_year : ''}}" class="form-control" type="number" name="publishing_year" id="publishing_year" placeholder="Publishing Year">
                                </div>
                                <div class="form-group">
                                        <label for="edition">Edition</label>
                                        <input value="{{$request->type == 'edit' ? $product->edition : ''}}" class="form-control" type="text" name="edition" id="edition" placeholder="Edition">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="categories">Select Categories</label>
                                    <div class="" style="height: 150px; overflow-y: scroll; border: 1px solid; border-radius: 5px; padding: 10px; border-color: #ced4da;">
                                        @foreach($categories as $cat)
                                          <input {{$request->type == 'edit' ? (count($product->categories->where('id', $cat->id)) > 0 ? 'checked' : '') : ''}} type="checkbox" name="categories[]" value="{{$cat->id}}" id="cat_{{$cat->id}}"> <label for="cat_{{$cat->id}}">{{$cat->category_name}}</label>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="snow-editor">Product Details</label>
                                        <textarea name="details" id="snow-editor" style="height: 300px;" cols="10" rows="5" placeholder="Product Details" class="form-control">{{$request->type == 'edit' ? $product->details : ''}}</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-group account-btn text-center">
                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">
                                    @if($request->type == 'edit')
                                        Update Product
                                    @else
                                        Create Product
                                    @endif</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
@endsection
