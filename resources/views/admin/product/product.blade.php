@extends('layouts.admin_layout')
@section('page_title')
    Product
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">Product List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#signup-modal"><i class="fe-plus"></i> New Product</button>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                            <tr>
                                <td>SL</td>
                                <td>Title</td>
                                <td>Cover Page</td>
                                <td>Writer Id</td>
                                <td>Price</td>
                                <td>Discount Price</td>
                                <td>Publishing Year</td>
                                <td>Edition</td>
                                <td>Details</td>
                                <td>Action</td>
                            </tr>
                        @forelse($products as $product)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$product->title}}</td>
                                <td><img style="height: 50px;" src="{{asset('storage')}}/{{$product->cover_page}}" alt=""></td>
                                <td>{{$product->writer_id}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td>{{$product->publishing_year}}</td>
                                <td>{{$product->edition}}</td>
                                <td>{{$product->details}}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" data-toggle="modal" data-target="#edit_{{$product->id}}"><i class="fe-edit"> Edit</i></a>

                                            <form action="{{route('product.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This product?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    {{--edit modal--}}
                                    <div id="edit_{{$product->id}}" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="m-0">
                                                        Update product
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                            @csrf
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="title">Title</label>
                                                                    <input class="form-control" type="text" value="{{$product->title}}" name="title" id="title" placeholder="Product Title">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="cover_page">Cover Page</label>
                                                                    <input class="form-control" name="cover_page" type="file" id="cover_page">
                                                                </div>
                                                            </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="writer_id">Writer Id</label>
                                                                <input class="form-control" value="{{$product->writer_id}}" name="writer_id" type="number" id="writer_id">
                                                            </div>
                                                        </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="price">Price</label>
                                                                    <input class="form-control" type="number" value="{{$product->price}}" name="price" id="price" placeholder="Price">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="discount_price">Discount Price</label>
                                                                    <input class="form-control" type="number" value="{{$product->discount_price}}" name="discount_price" id="discount_price" placeholder="Discount Price">
                                                                </div>
                                                            </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="publishing_year">Publishing Year</label>
                                                                <input class="form-control" type="number" value="{{$product->publishing_year}}" name="publishing_year" id="publishing_year" placeholder="Publishing Year">
                                                            </div>
                                                        </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="edition">Edition</label>
                                                                    <input class="form-control" type="text" value="{{$product->edition}}" name="edition" id="edition" placeholder="Edition">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="details">Product Details</label>
                                                                    <textarea name="details" id="details" cols="10" rows="5" placeholder="Product Details" class="form-control">{{$product->details}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group account-btn text-center">
                                                                <div class="col-12">
                                                                    <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Product</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100">No Product Found!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <!-- Signup modal content -->
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="m-0">
                                    Create a New Product
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="title">Title</label>
                                            <input class="form-control" type="text" name="title" id="title" placeholder="Product Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="cover_page">Cover Page</label>
                                            <input class="form-control" name="cover_page" type="file" id="cover_page">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="writer_id">Writer Id</label>
                                            <input class="form-control" name="writer_id" type="number" id="writer_id">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="price">Price</label>
                                            <input class="form-control" type="number" name="price" id="price" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="discount_price">Discount Price</label>
                                            <input class="form-control" type="number" name="discount_price" id="discount_price" placeholder="Discount Price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="publishing_year">Publishing Year</label>
                                            <input class="form-control" type="number" name="publishing_year" id="publishing_year" placeholder="Publishing Year">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="edition">Edition</label>
                                            <input class="form-control" type="text" name="edition" id="edition" placeholder="Edition">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="details">Product Details</label>
                                            <textarea name="details" id="details" cols="10" rows="5" placeholder="Product Details" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Product</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


        </div><!-- end col -->
    </div>
@endsection
