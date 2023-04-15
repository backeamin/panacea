@extends('layouts.admin_layout')
@section('page_title')
    Create Question
@endsection
@section('css')
    <link href="{{asset('admin')}}/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="{{asset('admin')}}/libs/switchery/switchery.min.js"></script>
@endsection
    @section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">
                                Update Question
                            </h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('questions.index')}}" class="btn btn-primary"><i class="fe-list"></i> View All Questions</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                                <form class="form-horizontal" action="{{route('questions.update', $question->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input class="form-control" value="{{$question->title}}" type="text" name="title" id="title" placeholder="Product Title">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <label for="option_a">Option a</label>
                                                        <input class="form-control" value="{{$question->option_a}}" type="text" name="option_a" id="option_a" placeholder="Option a">
                                                    </div>
                                                    <div class="col-1 custom-control custom-radio mt-4 text-right pr-1">
                                                        <input {{$question->correct_ans == 1 ? 'checked' : ''}} type="radio" id="correct_ans1" value="1" name="correct_ans" class="custom-control-input">
                                                        <label class="custom-control-label" for="correct_ans1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <label for="option_b">Option b</label>
                                                        <input class="form-control" value="{{$question->option_b}}" type="text" name="option_b" id="option_b" placeholder="Option b">
                                                    </div>
                                                    <div class="col-1 custom-control custom-radio mt-4 text-right pr-1">
                                                        <input {{$question->correct_ans == 2 ? 'checked' : ''}} type="radio" id="correct_ans2" value="2" name="correct_ans" class="custom-control-input">
                                                        <label class="custom-control-label" for="correct_ans2"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <label for="option_c">Option c</label>
                                                        <input class="form-control" value="{{$question->option_c}}" type="text" name="option_c" id="option_c" placeholder="Option c">
                                                    </div>
                                                    <div class="col-1 custom-control custom-radio mt-4 text-right pr-1">
                                                        <input {{$question->correct_ans == 3 ? 'checked' : ''}} type="radio" id="correct_ans3" value="3" name="correct_ans" class="custom-control-input">
                                                        <label class="custom-control-label" for="correct_ans3"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <label for="option_d">Option d</label>
                                                        <input class="form-control" value="{{$question->option_d}}" type="text" name="option_d" id="option_d" placeholder="Option d">
                                                    </div>
                                                    <div class="col-1 custom-control custom-radio mt-4 text-right pr-1">
                                                        <input {{$question->correct_ans == 4 ? 'checked' : ''}} type="radio" id="correct_ans4" value="4" name="correct_ans" class="custom-control-input">
                                                        <label class="custom-control-label" for="correct_ans4"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <label for="option_e">Option e</label>
                                                        <input class="form-control" value="{{$question->option_e}}" type="text" name="option_e" id="option_e" placeholder="Option e">
                                                    </div>
                                                    <div class="col-1 custom-control custom-radio mt-4 text-right pr-1">
                                                        <input {{$question->correct_ans == 5 ? 'checked' : ''}} type="radio" id="correct_ans5" value="5" name="correct_ans" class="custom-control-input">
                                                        <label class="custom-control-label" for="correct_ans5"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="model_test_id">Select Model Test</label>
                                                <Select id="model_test_id" name="model_test_id" class="form-control">
                                                    <option disabled selected>Select Model Test</option>
                                                    @foreach($model_tests as $model_test)
                                                        <option {{$model_test->id == $question->model_test_id ? 'selected' : ''}} value="{{$model_test->id}}">{{$model_test->title}}</option>
                                                    @endforeach
                                                </Select>
                                            </div>
                                            <div class="form-group">
                                                <label for="note">Note</label>
                                                <textarea class="form-control" name="note" id="note" cols="30" rows="17" placeholder="Note">{{$question->note}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center">
                                        <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">
                                            Update Question</button>
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
