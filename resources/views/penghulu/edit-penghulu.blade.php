@extends('part_admin.inti')


@section('title')
    Edit Penghulu
@endsection
@section('content')

<div class="container">
    <div class="card" style="margin-top:100px; margin-bottom:100px;">
        <div class="card-header">Edit data</div>
    
        <div class="card-body">
            <form action="/kua/{{ $penghulu->id }}" method="post">
             @method('put')
              @csrf
                <div class="mb-3">
                    <label for="nama_penghulu" class="form-label fw-bold">Nama Penghulu</label>
                    <input type="text" name="nama_penghulu" class="form-control" id="nama_penghulu" value="{{ $penghulu->nama_penghulu }}" aria-describedby="emailHelp" placeholder="Masukan Nama Penghulu">
                   @error('nama_penghulu')
                     <p class="text-danger">{{ $message }}</p>
                   @enderror
                  </div>
                  <div class="mb-3">
                    <label for="gol_jabatan" class="form-label fw-bold">Golongan Jabatan</label>
                    <input type="text" name="gol_jabatan" class="form-control" id="gol_jabatan" placeholder="Masukan Golongan Jabatan" value="{{ $penghulu->gol_jabatan }}">
                    @error('gol_jabatan')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Tempat Lahir" value="{{ $penghulu->tempat_lahir }}">
                    @error('tempat_lahir')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" value="{{ $penghulu->tanggal_lahir }}">
                    @error('tanggal_lahir')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat" value="{{ $penghulu->alamat }}">
                    @error('alamat')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="d-flex justify-content-center">
                  <button class="btn btn-primary " type="submit">Kirim</button>
                  <a class="btn btn-warning ms-3" href="/penghulu">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection