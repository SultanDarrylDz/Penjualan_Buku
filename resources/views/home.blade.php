@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <center><b>SELAMAT DATANG DITOKO KAMI</b></center><br>

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ route('kategori.index') }}">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ DB::table('kategori')->count() }}</h3>
                            <p>Total Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="ion far far-fw fad fa-list-alt"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <a href="{{ route('kategori.index') }}">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ DB::table('kategori')->count() }}</h3>
                                <p>Total Kategori</p>
                            </div>
                            <div class="icon">
                                <i class="ion far fa-address-book"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ route('transaksi.index') }}">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ DB::table('transaksi')->count() }}</h3>
                            <p>Total Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="ion far fa-address-card"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ route('pembeli.index') }}">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ DB::table('pembeli')->count() }}</h3>
                            <p>Total Pembeli</p>
                        </div>
                        <div class="icon">
                            <i class="ion fas fa-users"></i>
                        </div>
                    </div>
                </a>
                <!-- ./col -->


            </div>
        </div>
        @endsection

        @section('css')

        @endsection

        @section('js')

        @endsection


