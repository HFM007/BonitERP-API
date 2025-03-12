<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TProduct;
use Illuminate\Http\Request;

class TProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = TProduct::all();
    return response()->json([
      'status' => 1,
      'data' => $data,
      'message' => 'Data ditemukan!'
    ], 200);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
