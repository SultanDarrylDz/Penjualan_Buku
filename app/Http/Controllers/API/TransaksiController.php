<?php

namespace App\Http\Controllers\API;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Transaksi',
            'data' => $transaksi,
        ], 200);

        }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new Transaksi;
        $transaksi->pembeli_id = $request->pembeli_id;
        $transaksi->buku_id = $request->buku_id;
        $transaksi->tgl_beli = $request->tgl_beli;
        $transaksi->jumlah_buku = $request->jumlah_buku;
        $price = Buku::findOrfail($request->buku_id);
        $transaksi->harga = $price->harga;
        $transaksi->total = $price->harga * $request->jumlah_buku;
        $transaksi->uang = $request->uang;
        $transaksi->kembalian = $transaksi->uang - $transaksi->total;
        $buku = Buku::findOrFail($request->buku_id = $request->buku_id );
        $buku->stok -= $request->jumlah_buku;
        $buku->save();
        $transaksi->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Transaksi Berhasil dibuat',
            'data' => $transaksi,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Transaksi',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->buku_id = $request->buku_id;
        $transaksi->pembeli_id = $request->pembeli_id;
        $transaksi->jumlah_buku = $request->jumlah_buku;
        $transaksi->uang = $request->uang;
        $price = Buku::findOrfail($request->buku_id);
        $transaksi->harga = $price->harga;
        $transaksi->total = $price->harga * $request->jumlah_buku;
        $transaksi->uang = $request->uang;
        $transaksi->kembalian = $transaksi->uang - $transaksi->total;
        $transaksi->save();

        return response()->json([
            'success' => true,
            'message' => 'Show Data Transaksi',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Transaksi Berhasil dihapus',
            'data' => $transaksi,
        ], 200);
    }
}

