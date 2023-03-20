<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Exception;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $answers = Answer::all();
            return response()->json([
                'status' => '0',
                'message' => 'Success',
                'data' => $answers
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
            $getQuestion = Question::find($input['question_id']);
            if ($getQuestion === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Question not found'
                ], 400);
            }
            $answer = Answer::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $answer
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
        //
        try {
            $getAnswer = Answer::find($id);
            if ($getAnswer === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Answer not found'
                ], 400);
            }
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $getAnswer
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
            $getAnswer = Answer::find($id);
            if ($getAnswer === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Answer not found'
                ], 400);
            }
            $getAnswer->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $getAnswer
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
            $getAnswer = Answer::find($id);
            if ($getAnswer === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Answer not found'
                ], 400);
            }
            $getAnswer->delete();
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
