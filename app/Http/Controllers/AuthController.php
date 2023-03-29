<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class AuthController extends Controller
{
    //

    public function login()
    {
        try {
            if (!Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $user['token'] = 'Bearer ' . $user->createToken('MyApp')->accessToken;
            return response()->json(['status' => true, 'message' => 'Success', 'data' => $user], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }
    public function register(Request $request)
    {
        try {
            $validator = FacadesValidator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            return response()->json(['status' => true, 'message' => 'Success', 'data' => $user], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e
            ], 500);
        }
    }
}
