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
    $request->validate([
      't_products_nama' => 'required|string|max:255',
      't_products_harga' => 'required|string',
      't_products_deskripsi' => 'required|string',
      't_products_stok' => 'required|string',
      't_products_kategori' => 'required|string|max:255',
      't_products_gambar' => 'nullable|string',
      't_products_status' => 'required|string',
    ]);

    $data = new TProduct();
    $data->t_products_nama = $request->t_products_nama;
    $data->t_products_harga = $request->t_products_harga;
    $data->t_products_deskripsi = $request->t_products_deskripsi;
    $data->t_products_stok = $request->t_products_stok;
    $data->t_products_kategori = $request->t_products_kategori;
    $data->t_products_gambar = $request->t_products_gambar;
    $data->t_products_status = $request->t_products_status;

    $post = $data->save();

    if ($post) {
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
      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data ditemukan!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'data' => null,
        'message' => 'Data tidak ditemukan!'
      ], 404);
    }

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
