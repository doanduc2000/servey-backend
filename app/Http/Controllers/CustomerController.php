<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Exam;
use App\Models\Question;
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
            $question = DB::table('questions')->select('questions.id', 'questions.question', 'questions.correct_answer')->leftJoin('answers', 'questions.id', '=', 'answers.question_id')->where('questions.exam_id', '=', $examId)->get();
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
    public function getCustomer()
    {
        try {
            $customers = Customer::all();
            return response()->json([
                'status' => false,
                'message' => 'Success',
                'data' => $customers
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }
    public function store(Request $request)
    {
        try {
            $customers = [];
            foreach ($request->all() as $input) {
                $exam = Exam::find($input['exam_id']);
                if (!$exam) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Exam not found',
                    ], 400);
                }
                $question = Question::find($input['question_id']);
                if (!$question || $question->exam_id != $exam->id) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Question not found',
                    ], 400);
                }
                $getCustomer = Customer::select('exam_id', 'question_id', 'ip')
                    ->where('exam_id', '=', $exam->id)
                    ->where('question_id', '=', $question->id)
                    ->where('ip', '=', $input['ip'])
                    ->get();
                if (count($getCustomer) !== 0) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Question have answerd',
                    ], 400);
                }
                $customer = Customer::create($input);
                array_push($customers, $customer);
            }
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' =>  $customers
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }
}
