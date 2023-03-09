@extends('layouts.admin_layout')
@section('page_title')
    Writer
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">Writer List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#writer-modal"><i class="fe-plus"></i> New Writer</button>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>SL</td>
                            <td>Writer Name</td>
                            <td>Image</td>
                            <td>Designation</td>
                            <td>Description</td>
                            <td>Writer speech</td>
                            <td>Action</td>
                        </tr>
                        @forelse($writers as $writer)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$writer->name}}</td>
                                <td><img style="height: 50px;" src="{{asset('storage')}}/{{$writer->profile_picture}}" alt=""></td>
                                <td>{{$writer->designation}}</td>
                                <td>{{$writer->description}}</td>
                                <td>{{$writer->writer_speech}}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" data-toggle="modal" data-target="#edit_{{$writer->id}}"><i class="fe-edit"> Edit</i></a>

                                            <form action="{{route('writer.destroy', $writer->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This Writer?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    {{--edit modal--}}
                                    <div id="edit_{{$writer->id}}" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="m-0">
                                                        Update Writer
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{route('writer.update', $writer->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="name">Writer Name</label>
                                                                <input class="form-control" type="text" name="name" id="name" value="{{$writer->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="profile_picture">Profile Picture (Optional)</label>
                                                                <br>
                                                                <img class="mb-1" style="height: 100px" src="{{asset('storage')}}/{{$writer->profile_picture}}" alt="">
                                                                <input class="form-control" name="profile_picture" type="file" id="icon">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="designation">Designation</label>
                                                                <input class="form-control" type="text" name="designation" id="designation" value="{{$writer->designation}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="description">Description (Optional)</label>
                                                                <textarea class="form-control" name="description" id="description" cols="10" rows="3">{{$writer->description}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <label for="writer_speech">Writer Speech (Optional)</label>
                                                                <textarea class="form-control" type="text" name="writer_speech" id="writer_speech" cols="10" rows="3">{{$writer->writer_speech}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group account-btn text-center">
                                                            <div class="col-12">
                                                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Writer</button>
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
                                <td colspan="100">No Writer Found!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <!-- Signup modal content -->
                <div id="writer-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="m-0">
                                    Create a New Writer
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{route('writer.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="name">Writer Name</label>
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Writer Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="profile_picture">Profile Picture (Optional)</label>
                                            <input class="form-control" name="profile_picture" type="file" id="icon">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="designation">Designation</label>
                                            <input class="form-control" type="text" name="designation" id="designation" placeholder="Designation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="description">Description (Optional)</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="Description" cols="10" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="writer_speech">Writer Speech (Optional)</label>
                                            <textarea class="form-control" type="text" name="writer_speech" id="writer_speech" placeholder="Writer Speech" cols="10" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Writer</button>
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
