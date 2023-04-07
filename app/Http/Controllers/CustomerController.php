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
            $question = DB::table('questions')->select('questions.id', 'questions.question', 'questions.correct_answer', 'questions.explain')->leftJoin('answers', 'questions.id', '=', 'answers.question_id')->where('questions.exam_id', '=', $examId)->get();
            if (!$question) {
                return response()->json([
                    'status' => false,
                    'message' => 'Question not found'
                ], 400);
            }
            foreach ($question as $data) {
                $data->answer = DB::table('answers')->select('answer', 'id')->where('question_id', $data->id)->get();
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
            $customers = DB::table('customers')->select('ip')->get();
            foreach ($customers as $data) {
                $data->exam = DB::table('customers')
                    ->select('customers.exam_id', 'exams.exam', 'customers.created_at')
                    ->where('ip', '=', $data->ip)
                    ->join('exams', 'customers.exam_id', '=', 'exams.id')
                    ->get();
                $collectionExam = collect($data->exam);
                $data->exam = $collectionExam->unique()->values()->all();
                foreach ($data->exam as $key) {
                    $key->question = DB::table('customers')
                        ->select('questions.id', 'questions.question', 'customers.answer', 'questions.correct_answer')
                        ->where('ip', '=', $data->ip)->where('customers.exam_id', '=', $key->exam_id)
                        ->join('questions', 'customers.question_id', '=', 'questions.id')
                        ->get();
                    $collectionQuestion = collect($key->question);
                    $key->question = $collectionQuestion->unique()->values()->all();
                    foreach ($key->question as $item) {
                        $item->answers = DB::table('answers')->select('answer', 'id')->where('question_id', '=', $item->id)->get();
                        $collectionAnswer = collect($item->answers);
                        $item->answers = $collectionAnswer->unique()->values()->all();
                    }
                }
            }
            $collection = collect($customers);
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
    public function store(Request $request)
    {
        try {
            $ip = $request->ip();
            $customers = [];
            foreach ($request->all() as $input) {
                $input['ip'] = $ip;
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
