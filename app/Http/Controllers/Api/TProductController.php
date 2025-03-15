<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = TProduct::all();

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
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $rules = [
      't_products_nama' => 'required',
      't_products_harga' => 'required',
      't_products_deskripsi' => 'required',
      't_products_stok' => 'required',
      't_products_kategori' => 'required',
      't_products_gambar' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Data gagal ditambahkan!'
      ], 400);
    }

    $data = new TProduct();
    $data->t_products_nama = $request->t_products_nama;
    $data->t_products_harga = $request->t_products_harga;
    $data->t_products_deskripsi = $request->t_products_deskripsi;
    $data->t_products_stok = $request->t_products_stok;
    $data->t_products_kategori = $request->t_products_kategori;
    $data->t_products_gambar = $request->t_products_gambar;
    $data->t_products_status = 1;

    $post = $data->save();

    if ($post) {
      $data->makeHidden('t_products_id');

      return response()->json([
        'status' => '1',
        'data' => $data,
        'message' => 'Data berhasil disimpan!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'data' => null,
        'message' => 'Data gagal disimpan!'
      ], 400);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $data = TProduct::where('t_products_id', $id)->first();

    if ($data) {
      $data->makeHidden('t_products_id');

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
    $data = TProduct::where('t_products_id', $id)->first();

    if (empty($data)) {
      return response()->json([
        'status' => 0,
        'message' => 'Data tidak ditemukan!'
      ], 404);
    }

    $rules = [
      't_products_nama' => 'required',
      't_products_harga' => 'required',
      't_products_deskripsi' => 'required',
      't_products_stok' => 'required',
      't_products_kategori' => 'required',
      't_products_gambar' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Data gagal diperbarui!'
      ], 400);
    }

    $data->t_products_nama = $request->t_products_nama;
    $data->t_products_harga = $request->t_products_harga;
    $data->t_products_deskripsi = $request->t_products_deskripsi;
    $data->t_products_stok = $request->t_products_stok;
    $data->t_products_kategori = $request->t_products_kategori;
    $data->t_products_gambar = $request->t_products_gambar;
    $data->t_products_status = 1;

    $post = $data->save();

    if ($post) {
      $data->makeHidden('t_products_id');

      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data berhasil diperbarui!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data gagal diperbarui!'
      ], 400);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, string $id)
  {
    $data = TProduct::where('t_products_id', $id)->first();

    if (empty($data)) {
      return response()->json([
        'status' => 0,
        'message' => 'Data tidak ditemukan!'
      ], 404);
    }

    $rules = [
      't_products_status' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Data gagal diperbarui!'
      ], 400);
    }

    $data->t_products_status = $request->t_products_status;

    $post = $data->save();

    if ($post) {
      $data->makeHidden('t_products_id', 't_products_nama', 't_products_harga', 't_products_deskripsi', 't_products_stok', 't_products_kategori', 't_products_gambar');

      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data berhasil diperbarui!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data gagal diperbarui!'
      ], 400);
    }
  }
}
