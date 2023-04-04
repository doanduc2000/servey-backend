<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Exception;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $exams = DB::table('exams')->select('exams.id', 'exams.exam', 'questions.question')->leftJoin('questions', 'exams.id', '=', 'questions.exam_id')->get();
            foreach ($exams as $data) {
                $data->question = DB::table('questions')->select('question')->where('exam_id', $data->id)->get();
                $arr = array();
                foreach ($data->question as $key) {
                    array_push($arr, $key->question);
                }
                $data->question = count($arr);
            }
            $collection = collect($exams);
            $unique_data = $collection->unique()->values()->all();
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $unique_data
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
            $exam = Exam::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $exam
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
            $exam = Exam::find($id);
            if ($exam === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Exam not found',
                ], 400);
            }
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $exam
            ], 200);
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
            $exam = Exam::find($id);
            if (!$exam) {
                return response()->json([
                    'status' => false,
                    'message' => 'Exam not found',
                ], 400);
            }
            $exam->update($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $exam
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
            $exam = Exam::find($id);
            if ($exam === null) {
                return response()->json([
                    'status' => false,
                    'message' => 'Exam not found'
                ], 400);
            }

            $exam->delete();
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $exam
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }
}