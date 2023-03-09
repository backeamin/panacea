@extends('layouts.admin_layout')
@section('page_title')
    Message
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">Message List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#book_shop-modal"><i class="fe-plus"></i> New message</button>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>SL</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Message</td>
                            <td>Action</td>
                        </tr>
                        @forelse($messages as $message)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->message}}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" data-toggle="modal" data-target="#edit_{{$message->id}}"><i class="fe-edit"> Edit</i></a>

                                            <form action="{{route('message.destroy', $message->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This message?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    {{--edit modal--}}
                                    <div id="edit_{{$message->id}}" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="m-0">
                                                        Update message
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{route('message.update', $message->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="name">Name</label>
                                                                    <input class="form-control" value="{{$message->name}}" type="text" name="name" id="name" placeholder="Type your Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="email">Email</label>
                                                                    <input class="form-control" value="{{$message->email}}" type="text" name="email" id="email" placeholder="Email Address">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="message">Message</label>
                                                                    <textarea class="form-control" name="message" id="message" cols="30" placeholder="Type your Message" rows="10">value="{{$message->message}}"</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group account-btn text-center">
                                                                <div class="col-12">
                                                                    <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Update Message</button>
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
                                <td colspan="100">No message Found!</td>
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
                                    Create a New Message
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{route('message.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="name">Name</label>
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Type your Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="text" name="email" id="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" name="message" id="message" cols="30" placeholder="Type your Message" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create message</button>
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
