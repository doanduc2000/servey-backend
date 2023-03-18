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
                'status' => '0',
                'message' => 'Success',
                'data' => $exams
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => '1',
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
                'status' => '0',
                'message' => 'Success',
                'data' => $exam
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => '1',
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
    public function update(Request $request, Exam $exam)
    {
        try {
            if (!$exam) {
                return response()->json([
                    'status' => '1',
                    'message' => 'Fail',
                ], 400);
            }
            $exam->update($request->all());
            return response()->json([
                'status' => '0',
                'message' => 'Success',
                'data' => $exam
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => '1',
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
    public function destroy(Exam $exam)
    {
        try {
            if (!$exam) {
                return response()->json([
                    'status' => '1',
                    'message' => 'Fail',
                ], 400);
            }
            $exam->delete();
            return response()->json([
                'status' => '0',
                'message' => 'Success',
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => '1',
                'message' => $e
            ], 500);
        }
    }
}
