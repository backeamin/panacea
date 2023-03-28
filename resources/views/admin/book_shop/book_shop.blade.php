@extends('layouts.admin_layout')
@section('page_title')
    Book Shop
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">Book Shop List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#book_shop-modal"><i class="fe-plus"></i> New Shop</button>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>SL</td>
                            <td>Shop Name</td>
                            <td>Logo</td>
                            <td>Phone Number</td>
                            <td>Address</td>
                            <td>Action</td>
                        </tr>
                        @forelse($book_shops as $book_shop)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$book_shop->shop_name}}</td>
                                <td><img style="height: 50px;" src="{{asset('storage')}}/{{$book_shop->logo}}" alt=""></td>
                                <td>{{$book_shop->phone_number}}</td>
                                <td>{{$book_shop->address}}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" data-toggle="modal" data-target="#edit_{{$book_shop->id}}"><i class="fe-edit"></i> Edit</a>

                                            <form action="{{route('book_shop.destroy', $book_shop->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This Book Shop?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    {{--edit modal--}}
                                    <div id="edit_{{$book_shop->id}}" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="m-0">
                                                        Update Book Shop
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{route('book_shop.update', $book_shop->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="shop_name">Shop Name</label>
                                                                <input class="form-control" type="text" name="shop_name" id="shop_name" value="{{$book_shop->shop_name}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="logo">Logo (Optional)</label>
                                                                <input class="form-control" name="logo" type="file" id="icon">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="address">Shop Address</label>
                                                                <input class="form-control" type="text" name="address" id="address" value="{{$book_shop->address}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="phone_number">Shop Phone Number</label>
                                                                <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{$book_shop->phone_number}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Book Shop</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100">No Shop Found!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <!-- Signup modal content -->
                <div id="book_shop-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="m-0">
                                    Create a New Book Shop
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{route('book_shop.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="shop_name">Shop Name</label>
                                            <input class="form-control" type="text" name="shop_name" id="shop_name" placeholder="Shop Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="logo">Logo (Optional)</label>
                                            <input class="form-control" name="logo" type="file" id="icon">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="address">Address</label>
                                            <input class="form-control" type="text" name="address" id="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="phone_number">Phone Number</label>
                                            <input class="form-control" type="text" name="phone_number" id="phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Book Shop</button>
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
