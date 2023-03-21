<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Exception;

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
            $exams = Exam::all();
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $exams
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
