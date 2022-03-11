@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Tambah Data Transaksi

@stop

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Transaksi</div>
                    <div class="card-body">
                       <form action="{{route('transaksi.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                                <label for="">Masukan Tanggal Beli</label>
                                <input type="date" name="tgl_beli" class="form-control @error('tgl_beli') is-invalid @enderror">
                                 @error('tgl_beli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="">Masukan Nama Pembeli</label>
                            <select name="pembeli_id" class="form-control @error('pembeli_id') is-invalid @enderror">
                                @foreach($pembeli as $data)
                                <option value="{{$data->id}}">{{$data->nama_pembeli}}</option>
                                @endforeach
                            </select>
                           @error('id_pembeli')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Judul</label>
                            <select name="buku_id" class="form-control @error('buku_id') is-invalid @enderror">
                                @foreach($buku as $data)
                                <option value="{{$data->id}}">{{$data->judul}}</option>
                                @endforeach
                            </select>
                            @error('buku_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                            <div class="form-group">
                                <label for="">Masukan Jumlah Buku</label>
                                <input type="number" name="jumlah_buku" class="form-control @error('jumlah_buku') is-invalid @enderror">
                                 @error('jumlah_buku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Uang</label>
                                <input type="number" name="uang" class="form-control @error('uang') is-invalid @enderror">
                                 @error('uang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            </div>
                       </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')

@stop

@section('js')

@stop
