<?php

namespace App\Http\Controllers\API;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembeliController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli = Pembeli::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli',
            'data' => $pembeli,
        ], 200);

    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $pembeli = new Pembeli;
        $pembeli->kode_pembeli = mt_rand(1000,9999);
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        $pembeli->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli Berhasil dibuat',
            'data' => $buku,
        ], 201);
    }
    public function show($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Pembeli',
            'data' => $pembeli,
        ], 200);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->kode_pembeli = mt_rand(1000,9999);
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->no_hp = $request->no_hp;
        $pembeli->save();
        $buku = Pembeli::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Show Data Pembeli',
            'data' => $pembeli,
        ], 200);

    }
    public function destroy($id)
    {
        $pembeli = Pembeli::find($id);
        $pembeli->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli Berhasil dihapus',
            'data' => $pembeli,
        ], 200);
    }
}
