@extends('layouts.admin_layout')
@section('page_title')
    Slider
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">Slider List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#book_shop-modal"><i class="fe-plus"></i> New Slider</button>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>SL</td>
                            <td>Title</td>
                            <td>Image</td>
                            <td>Action</td>
                        </tr>
                        @forelse($sliders as $slider)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$slider->title}}</td>
                                <td><img style="height: 50px;" src="{{asset('storage')}}/{{$slider->image}}" alt=""></td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" data-toggle="modal" data-target="#edit_{{$slider->id}}"><i class="fe-edit"> Edit</i></a>

                                            <form action="{{route('slider.destroy', $slider->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This Slider?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    {{--edit modal--}}
                                    <div id="edit_{{$slider->id}}" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="m-0">
                                                        Update Slider
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{route('slider.update', $slider->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="title">Slider Title</label>
                                                                    <input class="form-control" value="{{$slider->title}}" type="text" name="title" id="title" placeholder="Slider Title">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="image">Image</label> <br>
                                                                    <img style="margin: 5px 0; height: 50px;" src="{{asset('storage')}}/{{$slider->image}}" alt="">
                                                                    <input class="form-control" name="image" type="file" id="image">
                                                                </div>
                                                            </div>
                                                            <div class="form-group account-btn text-center">
                                                                <div class="col-12">
                                                                    <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Slider</button>
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
                                <td colspan="100">No Slider Found!</td>
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
                                    Create a New Slider
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="title">Slider Title</label>
                                            <input class="form-control" type="text" name="title" id="title" placeholder="Slider Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="image">Image</label>
                                            <input class="form-control" name="image" type="file" id="image">
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Slider</button>
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
