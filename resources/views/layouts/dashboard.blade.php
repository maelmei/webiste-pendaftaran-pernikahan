@extends('layouts.inti')

@section('title')
    KUA Kecamatan Gandus
@endsection
@section('content')
<style>
  
 </style>
<div id='halo' class="d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card text-center" style="width: 70%">
        <div class="card-header">
           <h3>Selamat Datang !</h3> {{ auth()->user()->role }}
        </div>
        <div class="card-body">
            <h5 class="card-title">KUA Kecamatan Gandus</h5>
            <p class="card-text">Ini Merupakan Sistem Informasi Pendaftaran Pernikahan KUA Kecamatan Gandus 
                dimana dapat<br>Mencatat kegiatan administrasi pernikahan. </p>

 <p class="card-text">Anda telah login sebagai <b>{{ auth()->user()->email }}</b></p>
@if(auth()->user()->cek_id == 'Belum Daftar')
       <a href="daftarAkad" class="btn btn-primary fw-bold">Daftar Akad</a>
@elseif(auth()->user()->cek_id == 'Belum Terverifikasi')
<a href="#" class="btn btn-warning fw-bold">Belum Terverifikasi</a>

@elseif(auth()->user()->cek_id == 'Kurang Item')
<p class="text-danger">{{ auth()->user()->comment }}</p>
<a href="user_edit/{{ auth()->user()->id }}" class="btn btn-danger fw-bold">Data Belum Valid</a>
@elseif(auth()->user()->cek_id == 'Sudah Terverifikasi')
<button class="btn btn-success">Sudah Terverifikasi</button><br>
<a href="reportuser/{{ auth()->user()->id }}" class="btn btn-info mt-3 fw-bold">Silahkan Download</a>
@endif

 </div>
        <div class="card-footer fw-bold">
          <h5 style="font-family:cursive">KUA GANDUS</h5> 
        </div>
    </div>
</div>
@endsection