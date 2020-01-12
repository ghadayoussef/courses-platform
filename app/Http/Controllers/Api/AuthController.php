<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Student;


class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function register(Request $request)
    { 
      $student = Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'gender' => $request->gender,
        'DOB' => date('Y-m-d',strtotime($request->birthdate)),
        'avatar'=> $request->avatar
      ]);

      $token = auth('api')->login($student);
      return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      if (!$token = auth('api')->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
      return $this->respondWithToken($token);
    }

    public function getAuthStudent(Request $request)
    {
        return response()->json(auth('api')->user());
    }
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message'=>'Successfully logged out']);
    }
    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60

        // 'expires_in' => auth()->factory()->getTTL() * 60
      ]);
    }

}