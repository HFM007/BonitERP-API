<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TUser;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
  public function __invoke(Request $request)
  {
    $rules = [
      't_user_nama' => 'required',
      't_user_email' => 'required|email',
      't_user_password' => 'required|min:8',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Gagal mendaftar user'
      ], 400);
    }

    $data = new TUser();
    $data->t_user_nama = $request->t_user_nama;
    $data->t_user_email = $request->t_user_email;
    $data->t_user_password = bcrypt($request->t_user_password);
    $data->t_user_status = '1';

    $post = $data->save();

    if ($post) {
      return response()->json([
        'status' => 1,
        'data' => new UserResource($data),
        'message' => 'User telah terdaftar'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Gagal mendaftar user',
      ], 400);
    }
  }
}
