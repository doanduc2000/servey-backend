<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Question;
use Exception;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        try {
            $examId = $request->query('exam_id');
            $questions = Question::all();
            if ($examId) {
                $questions = Question::where('exam_id', '=',  $examId)->get();
            }
            return response()->json([
                'status' => '0',
                'message' => 'Success',
                'data' => $questions
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input =  $request->all();
            $getExam = Exam::find($input['exam_id']);
            if ($getExam === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Exam not found'
                ], 400);
            }
            $question = Question::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $question
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $getQuestion = Question::find($id);
            if ($getQuestion === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Question not found'
                ], 400);
            }
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $getQuestion
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $getQuestion = Question::find($id);
            if ($getQuestion === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Question not found'
                ], 400);
            }
            $getQuestion->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $getQuestion
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $getQuestion = Question::find($id);
            if ($getQuestion === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Question not found'
                ], 400);
            }
            $getQuestion->delete();
            return response()->json([
                'status' => true,
                'message' => 'Success',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }
}
