@extends('layouts.master_app')

@section('title', 'Dashboard')

@section('content')
<section class="content-header">
    <h1>
        Dashboard
        <small>Home</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Buku</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Anggota</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Peminjaman</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pengembalian</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
