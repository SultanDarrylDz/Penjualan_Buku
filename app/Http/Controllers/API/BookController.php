<?php

namespace App\Http\Controllers\API;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use DB;


class BookController extends Controller
{
    public function kategori()
    {
        $kategori = Kategori::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Kategori',
            'data' => $kategori,
        ], 200);

    }

    public function penerbit()
    {
        $penerbit = Penerbit::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Penerbit',
            'data' => $penerbit,
        ], 200);

    }

    public function pengarang()
    {
        $pengarang = Pengarang::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Pengarang',
            'data' => $pengarang,
        ], 200);

    }
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = DB::table('buku')
        ->join('kategori', 'buku.nama_kategori', '=', 'id')
        ->join('pengarang', 'buku.nama_pengarang', '=', 'id')
        ->join('penerbit', 'buku.nama_penerbit', '=', 'id')
        ->select('buku.kode_buku', 'buku.judul', 'kategori.nama_kategori', 'pengarang.nama_pengarang', 'penerbit.nama_penerbit', 'buku.deskripsi', 'buku.stok', 'buku.harga', 'buku.cover')
        ->get();
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
        // $buku->nama_kategori = $request->nama_kategori;
        // $buku->nama_pengarang = $request->nama_pengarang;
        // $buku->nama_penerbit = $request->nama_penerbit;
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
        // $buku->nama_kategori = $request->nama_kategori;
        // $buku->nama_pengarang = $request->nama_pengarang;
        // $buku->nama_penerbit = $request->nama_penerbit;
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
        $buku->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Buku Berhasil dihapus',
            'data' => $buku,
        ], 200);
        }
    }

