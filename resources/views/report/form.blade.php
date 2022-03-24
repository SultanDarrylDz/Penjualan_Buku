@extends('adminlte::page')

@section('css')

@endsection

@section('js')

@endsection

@section('content')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Cetak Laporan') }}</div>

                    <div class="card-body">
                        <form action="{{ route('reportTransaksi') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="tanggalAwal" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="tanggalAkhir" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">Cari Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
