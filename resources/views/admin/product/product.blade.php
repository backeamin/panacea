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
                            <a href="{{route('product.create')}}" class="btn btn-primary"><i class="fe-plus"></i> New Product</a>
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
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" href="{{route('product.create')}}?type=edit&id={{$product->id}}"><i class="fe-edit"></i> Edit</a>

                                            <form action="{{route('product.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This product?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100">No Product Found!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
        </div>
    </div>
@endsection
