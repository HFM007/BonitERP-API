<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MKategoriController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = MKategori::all();

    if ($data->count() !=0) {
      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data ditemukan!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data tidak ditemukan!'
      ], 404);
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $rules = [
      'm_kategori_nama' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Data gagal ditambahkan!'
      ]);
    }

    $data = new MKategori();
    $data->m_kategori_nama = $request->m_kategori_nama;
    $data->m_kategori_status = 1;

    $post = $data->save();

    if ($post) {
      $data->makeHidden(['m_kategori_id', 'm_kategori_status']);
      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data berhasil ditambahkan!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data gagal ditambahkan!'
      ], 400);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $data = MKategori::where('m_kategori_id', $id)->first();
    if ($data) {
      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data ditemukan!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data tidak ditemukan!'
      ], 404);
    }
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $data = MKategori::where('m_kategori_id', $id)->first();

    if (empty($data)) {
      return response()->json([
        'status' => 0,
        'message' => 'Data tidak ditemukan!'
      ], 404);
    }

    $rules = [
      'm_kategori_nama' => 'required',
      'm_kategori_status' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Data gagal diupdate!'
      ]);
    }

    $data->m_kategori_nama = $request->m_kategori_nama;
    $data->m_kategori_status = $request->m_kategori_status;

    $post = $data->save();

    if ($post) {
      $data->makeHidden(['m_kategori_id']);
      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data berhasil diupdate!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data gagal diupdate!'
      ], 400);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $data = MKategori::where('m_kategori_id', $id)->first();

    $deleted = $data->delete();

    if ($deleted) {
      $data->makeHidden(['m_kategori_id','m_kategori_nama']);
      return response()->json([
        'status' => 1,
        'message' => 'Data berhasil dihapus!'
      ], status: 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data gagal dihapus!'
      ], 400);
    }

  }
}
