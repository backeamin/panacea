@extends('layouts.admin_layout')
@section('page_title')
    Review
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">Review List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#review-modal"><i class="fe-plus"></i> New Review</button>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>SL</td>
                            <td>Name</td>
                            <td>Image</td>
                            <td>Date</td>
                            <td>Ratings</td>
                            <td>Review</td>
                            <td>Action</td>
                        </tr>
                        @forelse($reviews as $review)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$review->name}}</td>
                                <td><img style="height: 50px;" src="{{asset('storage')}}/{{$review->image}}" alt=""></td>
                                <td>{{$review->ratings}}</td>
                                <td>{{$review->date}}</td>
                                <td>{{$review->review}}</td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" data-toggle="modal" data-target="#edit_{{$review->id}}"><i class="fe-edit"> Edit</i></a>

                                            <form action="{{route('review.destroy', $review->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This Review?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                    {{--edit modal--}}
                                    <div id="edit_{{$review->id}}" class="modal fade text-left" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="m-0">
                                                        Update Book Shop
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" action="{{route('review.update', $review->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="name">Name</label>
                                                                    <input class="form-control" type="text" name="name" id="name" value="{{$review->name}}" placeholder="Enter a Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="image">Logo (Optional)</label>
                                                                    <input class="form-control" name="image" type="file" id="image">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="date">Date</label>
                                                                    <input class="form-control" type="text" value="{{$review->date}}" name="date" id="date" placeholder="Enter a Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="ratings">Ratings</label>
                                                                    <input class="form-control" type="text" value="{{$review->ratings}}" name="ratings" id="ratings" placeholder="Enter a Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-12">
                                                                    <label for="review">Review</label>
                                                                    <textarea class="form-control" type="text" name="review" id="review" cols="10" rows="5" placeholder="Your Review Write Here!">{{$review->review}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group account-btn text-center">
                                                                <div class="col-12">
                                                                    <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Review</button>
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
                                <td colspan="100">No Review Found!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <!-- Signup modal content -->
                <div id="review-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="m-0">
                                    Create a New Review
                                </h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="{{route('review.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="name">Name</label>
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Enter a Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="image">Image</label>
                                            <input class="form-control" name="image" type="file" id="image">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="date">Date</label>
                                            <input class="form-control" type="text" name="date" id="date" placeholder="Enter a Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="ratings">Rating</label>
                                            <input class="form-control" type="text" name="ratings" id="ratings" placeholder="Enter a Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="review">Review</label>
                                            <textarea class="form-control" type="text" name="review" id="review" cols="10" rows="5" placeholder="Your Review Write Here!"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Create Review</button>
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
