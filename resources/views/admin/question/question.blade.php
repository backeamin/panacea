@extends('layouts.admin_layout')
@section('page_title')
    Question
@endsection

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h4 class="m-0">Question List</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{route('questions.create')}}" class="btn btn-primary"><i class="fe-plus"></i> New Question</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>SL</td>
                            <td>Title</td>
                            <td>Model Test</td>
                            <td>Option a</td>
                            <td>Option b</td>
                            <td>Option c</td>
                            <td>Option d</td>
                            <td>Option e</td>
                            <td>Correct answer</td>
                            <td>Action</td>
                        </tr>
                        @forelse($questions as $question)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$question->title}}</td>
                                <td>{{$question->model_test->title}}</td>
                                <td>{{$question->option_a}}</td>
                                <td>{{$question->option_b}}</td>
                                <td>{{$question->option_c}}</td>
                                <td>{{$question->option_d}}</td>
                                <td>{{$question->option_e}}</td>
                                <td>{{$question->correct_ans}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item btn btn-outline-primary text-center waves-effect waves-light" href="{{route('questions.edit', $question->id)}}"><i class="fe-edit"></i> Edit</a>

                                            <form action="{{route('questions.destroy', $question->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure to Delete This Question?')" class="dropdown-item btn btn-outline-danger text-center"><i class="fe-trash"></i> Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100">No Question Found!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
@endsection
