@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    Tambah Data Buku

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Buku</div>
                    <div class="card-body">
                       <form action="{{route('buku.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                        <div class="form-group">
                            <label for="">Masukan Judul Buku</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror">
                             @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Kategori</label>
                            <select name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @foreach($kategori as $data)
                                <option value="{{$data->id}}">{{$data->nama_kategori}}</option>
                                @endforeach
                            </select>
                            @error('nama_kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Nama Pengarang</label>
                            <select name="nama_pengarang" class="form-control @error('nama_pengarang') is-invalid @enderror">
                                @foreach($pengarang as $data)
                                <option value="{{$data->id}}">{{$data->nama_pengarang}}</option>
                                @endforeach
                            </select>
                           @error('nama_pengarang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label for="">Masukan Nama Penerbit</label>
                                <select name="nama_penerbit" class="form-control @error('nama_penerbit') is-invalid @enderror">
                                    @foreach($penerbit as $data)
                                    <option value="{{$data->id}}">{{$data->nama_penerbit}}</option>
                                    @endforeach
                                </select>
                               @error('nama_penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" cols="150">
                            </textarea>
                            <div class="form-group">
                                <label for="">Masukan Stok</label>
                                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror">
                                 @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Harga</label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
                                 @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label for="">Masukan Cover Buku</label>
                            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
                            @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
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
