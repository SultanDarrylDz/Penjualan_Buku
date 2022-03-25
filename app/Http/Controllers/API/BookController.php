<?php

namespace App\Http\Controllers\API;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Buku',
            'data' => $buku,
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $buku = new Buku;
        $buku->kode_buku = mt_rand(1000,9999);
        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->nama_kategori = $request->nama_kategori;
        $buku->nama_pengarang = $request->nama_pengarang;
        $buku->nama_penerbit = $request->nama_penerbit;
        $buku->stok = $request->stok;
        $buku->harga = $request->harga;
        $buku->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Buku Berhasil dibuat',
            'data' => $buku,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Buku',
            'data' => $buku,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
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
     * @param  \App\Models\Buku  $buku
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->deskripsi = $request->deskripsi;
        $buku->nama_kategori = $request->nama_kategori;
        $buku->nama_pengarang = $request->nama_pengarang;
        $buku->nama_penerbit = $request->nama_penerbit;
        $buku->stok = $request->stok;
        $buku->harga = $request->harga;
        $buku->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Buku Berhasil diedit',
            'data' => $buku,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $buku = Buku::find($id);
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Buku Berhasil dihapus',
            'data' => $buku,
        ], 200);
        }
    }

