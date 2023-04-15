@extends('layouts.admin_layout')
@section('page_title')
    Model Test
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">Model Test List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#model_test-modal"><i class="fe-plus"></i> New Model Test</button>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>SL</td>
                            <td>Title</td>
                            <td>Thumbnail</td>
                            <td>Starting Date & Time</td>
                            <td>Ending Date & Time</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                        @forelse($model_tests as $model_test)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$model_test->title}}</td>
                                <td><img style="height: 50px;" src="{{asset('storage')}}/{{$model_test->thumbnail}}" alt=""></td>
                                <td>{{$model_test->starting_date_time}}</td>
                                <td>{{$model_test->ending_date_time}}</td>
                                <td>{{$model_test->description}}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" data-toggle="modal" data-target="#edit_{{$model_test->id}}"><i class="fe-edit"></i> Edit</a>

                                            <form action="{{route('model_test.destroy', $model_test->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This Model Test?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    {{--edit modal--}}
                                    <div id="edit_{{$model_test->id}}" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="m-0">
                                                        Update Model Test
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{route('model_test.update', $model_test->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                            <div class="form-group">
                                                                <label for="title">Title</label>
                                                                <input class="form-control" type="text" name="title" id="title" value="{{$model_test->title}}" placeholder="Title">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="thumbnail">Thumbnail</label> <br>
                                                                <img style="margin: 5px 0; height: 50px;" src="{{asset('storage')}}/{{$model_test->thumbnail}}" alt="">
                                                                <input class="form-control" name="thumbnail" type="file" id="thumbnail">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="starting_date_time">Starting Date & Time</label>
                                                                <input class="form-control" type="datetime-local" value="{{$model_test->starting_date_time}}" name="starting_date_time" id="starting_date_time">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="ending_date_time">Ending Date & Time</label>
                                                                <input class="form-control" type="datetime-local" value="{{$model_test->ending_date_time}}" name="ending_date_time" id="ending_date_time">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Description</label>
                                                                <textarea class="form-control" name="description" id="description" cols="10" rows="5" placeholder="Description">{{$model_test->description}}</textarea>
                                                            </div>
                                                            <div class="form-group account-btn text-center">
                                                                <div class="col-12">
                                                                    <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Model Test</button>
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
                                <td colspan="100">No Model Test Found!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <!-- Signup modal content -->
                <div id="model_test-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="m-0">
                                    Create a New Model Test
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{route('model_test.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                            <label for="thumbnail">Thumbnail</label>
                                            <input class="form-control" name="thumbnail" type="file" id="thumbnail">
                                    </div>
                                    <div class="form-group">
                                            <label for="starting_date_time">Starting Date & Time</label>
                                            <input class="form-control" type="datetime-local" name="starting_date_time" id="starting_date_time">
                                    </div>
                                    <div class="form-group">
                                            <label for="ending_date_time">Ending Date & Time</label>
                                            <input class="form-control" type="datetime-local" name="ending_date_time" id="ending_date_time">
                                    </div>
                                    <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" cols="10" rows="5" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Model Test</button>
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
