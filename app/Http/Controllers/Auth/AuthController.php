<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function sendResponse($data, $message, $status = 200)
    {
        $response = [
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response, $status);
    }

    public function sendError($errorData, $message, $status = 500)
    {
        $response = [];
        $response['message'] = $message;
        if (!empty($errorData)) {
            $response['data'] = $errorData;
        }

        return response()->json($response, $status);
    }



    public function login(Request $request)
    {
        $input = $request->only('email', 'password');

        $validator = Validator::make($input, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors(), 'Validation Error', 422);
        }

        try {
            if (! $token = JWTAuth::attempt($input)) {
                return $this->sendError([], "invalid login credentials", 400);
            }
        } catch (JWTException $e) {
            return $this->sendError([], $e->getMessage(), 500);
        }

        $success = [
            'token' => $token,
        ];
        return $this->successResponse($success, 'successful login');
    }

}
