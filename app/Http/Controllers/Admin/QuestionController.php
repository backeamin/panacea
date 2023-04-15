<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelTest;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.question.question', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['model_tests'] = ModelTest::all();
        $data['questions'] = Question::all();
        return view('admin.question.question_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'Question Title required',
        ]);
        Question::create([
            'model_test_id' =>$request->model_test_id,
            'title' =>$request->title,
            'option_a' =>$request->option_a,
            'option_b' =>$request->option_b,
            'option_c' =>$request->option_c,
            'option_d' =>$request->option_d,
            'option_e' =>$request->option_e,
            'correct_ans' =>$request->correct_ans,
            'note' =>$request->note
        ]);
        Toastr::success('Question Added Successfully', 'Success');

        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ['model_tests'] = ModelTest::all();
        $data['question'] = Question::findOrFail($id);

        return view('admin.question.question_update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'Question Title required',
        ]);
        $question = Question::findOrFail($id);
        $question->update([
            'model_test_id' =>$request->model_test_id,
            'title' =>$request->title,
            'option_a' =>$request->option_a,
            'option_b' =>$request->option_b,
            'option_c' =>$request->option_c,
            'option_d' =>$request->option_d,
            'option_e' =>$request->option_e,
            'correct_ans' =>$request->correct_ans,
            'note' =>$request->note
        ]);
        Toastr::success('Question Updated Successfully', 'Success');

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrfail($id);
        // image thakle delete korte hobe
        $question->delete();
        Toastr::success("Question Deleted Successfully", "Success");
        return back();
    }
}
