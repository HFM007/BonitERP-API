<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TUser;

class LoginController extends Controller
{
  public function __invoke(Request $request)
  {
    $rules = [
      't_user_email' => 'required|email',
      't_user_password' => 'required|min:8',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Gagal login'
      ], 400);
    }

    $user = TUser::where('t_user_email', $request->t_user_email)->first();

    if (!$user) {
      return response()->json([
        'status' => 0,
        'message' => 'Email tidak terdaftar!'
      ], 400);
    }

    if (!password_verify($request->t_user_password, $user->t_user_password)) {
      return response()->json([
        'status' => 0,
        'message' => 'Password salah!'
      ], 400);
    }
    
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
      'status' => 1,
      'user' => $user,
      'token' => $token,
      'message' => 'Login berhasil!'
    ], 200);
  }
}
