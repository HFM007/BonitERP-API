<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TTransaksi;
use App\Models\TProduct;
use App\Models\MKategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Raw;

class TTransaksiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = TTransaksi::all();
    if ($data->count() != 0) {
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
      't_transaksi_user_id' => 'required',
      't_transaksi_produk_id' => 'required',
      't_transaksi_kategori_id' => 'required',
      't_transaksi_jumlah' => 'required',
      't_transaksi_total_harga' => 'required',
      't_transaksi_jenis_pembayaran' => 'required',
      't_transaksi_status' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Data gagal ditambahkan!'
      ], 400);
    }

    $data = new TTransaksi();
    $data->t_transaksi_user_id = $request->t_transaksi_user_id;
    $data->t_transaksi_produk_id = $request->t_transaksi_produk_id;
    $data->t_transaksi_kategori_id = $request->t_transaksi_kategori_id;
    $data->t_transaksi_jumlah = $request->t_transaksi_jumlah;
    $data->t_transaksi_total_harga = $request->t_transaksi_total_harga;
    $data->t_transaksi_jenis_pembayaran = $request->t_transaksi_jenis_pembayaran;
    $data->t_transaksi_status = 1;

    $post = $data->save();

    if ($post) {
      $data = $data->makeHidden('t_transaksi_id');

      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data berhasil disimpan!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data gagal disimpan!'
      ], 400);
    }

  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $data = TTransaksi::where('t_transaksi_id', $id)->first();

    if ($data) {
      $data->makeHidden('t_transaksi_id');

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
    $data = TTransaksi::where('t_transaksi_id', $id)->first();
    
    if (empty($data)) {
      return response()->json([
        'status' => 0,
        'message' => 'Data tidak ditemukan!'
      ], 404);
    }

    $rules = [
      't_transaksi_user_id' => 'required',
      't_transaksi_produk_id' => 'required',
      't_transaksi_kategori_id' => 'required',
      't_transaksi_jumlah' => 'required',
      't_transaksi_total_harga' => 'required',
      't_transaksi_jenis_pembayaran' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Data gagal ditambahkan!'
      ], 400);
    }

    $data->t_transaksi_user_id = $request->t_transaksi_user_id;
    $data->t_transaksi_produk_id = $request->t_transaksi_produk_id;
    $data->t_transaksi_kategori_id = $request->t_transaksi_kategori_id;
    $data->t_transaksi_jumlah = $request->t_transaksi_jumlah;
    $data->t_transaksi_total_harga = $request->t_transaksi_total_harga;
    $data->t_transaksi_jenis_pembayaran = $request->t_transaksi_jenis_pembayaran;
    $data->t_transaksi_status = 1;

    $post = $data->save();

    if ($post) {
      $data = $data->makeHidden('t_transaksi_id');

      return response()->json([
        'status' => 1,
        'data' => $data,
        'message' => 'Data berhasil disimpan!'
      ], 200);
    } else {
      return response()->json([
        'status' => 0,
        'message' => 'Data gagal disimpan!'
      ], 400);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request, string $id)
  {
    $data = TTransaksi::where('t_transaksi_id', $id)->first();

    if (empty($data)) {
      return response()->json([
        'status' => 0,
        'message' => 'Data tidak ditemukan!'
      ], 404);
    }

    $rules = [
      't_transaksi_status' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      return response()->json([
        'status' => 0,
        'data' => $validator->errors(),
        'message' => 'Data gagal dihapus!'
      ], 400);
    }

    $data->t_transaksi_status = $request->t_transaksi_status;

    $post = $data->save();

    if ($post) {
      $data->makeHidden('t_transaksi_id', 't_transaksi_produk_id', 't_transaksi_kategori_id', 't_transaksi_user_id', 't_transaksi_jumlah', 't_transaksi_total_harga', 't_transaksi_jenis_pembayaran');

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
