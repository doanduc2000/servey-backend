<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    //
    public function getAllQuestion(Request $request)
    {
        try {

            $examId = $request->query('examId');
            $exams = Exam::find($examId);
            if (!$exams) {
                return response()->json([
                    'status' => false,
                    'message' => 'Exam not found'
                ], 400);
            }
            $question = DB::table('questions')->select('questions.id', 'questions.question', 'questions.correct_answer')->join('answers', 'questions.id', '=', 'answers.question_id')->where('questions.exam_id', '=', $examId)->get();
            if (!$question) {
                return response()->json([
                    'status' => false,
                    'message' => 'Question not found'
                ], 400);
            }
            foreach ($question as $data) {
                $data->answer = DB::table('answers')->select('answer')->where('question_id', $data->id)->get();
                $arr = array();
                foreach ($data->answer as $key) {
                    array_push($arr, $key->answer);
                }
                $data->answer = $arr;
            }

            $collection = collect($question);
            $unique_data = $collection->unique()->values()->all();
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => [
                    'examId' => $exams->id,
                    'exam' => $exams->exam,
                    'question' => $unique_data,
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }
}