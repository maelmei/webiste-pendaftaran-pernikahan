<!DOCTYPE html>
@extends('part_admin.inti')

@section('title')
    admin
@endsection

@section('content')

<div id='halo' class="d-flex justify-content-center align-items-center" style="height:60vh">
    <div class="card text-center" style="width: 70%">
        <div class="card-header bg-light">
         <h3> <marquee>SELAMAT DATANG !</marquee> </h3> 
        </div>
        <div class="card-body">
            <h5 class="fw-bold">KUA Kecamatan Gandus</h5>
            <p class="card-text">Ini Merupakan Sistem Informasi Pendaftaran Pernikahan KUA Kecamatan Gandus 
                dimana dapat<br>Mencatat kegiatan administrasi pernikahan. </p>

 <p class="card-text">Anda telah login sebagai <b>{{ Auth::guard('admin')->user()->level }}</b></p>

 </div>
        <div class="card-footer fw-bold">
          <h5 style="font-family:cursive">KUA GANDUS</h5> 
        </div>
    </div>
    
</div>

<div class="container">
<div class="row">
  
    <div class="col-md-4">

        <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $akad }}</h3>
              <p>Jumlah Akad</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="/akad_admin" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="small-box bg-gradient-success">
            <div class="inner">
              <h3>{{ $user }}</h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a href="/user" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="small-box bg-gradient-danger">
            <div class="inner">
              <h3>{{ $penghulu }}</h3>
              <p>Penghulu</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a href="/penghulu" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      
      
</div>
</div>

@include('sweetalert::alert')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
@endsection
