@extends('part_admin.inti')

@section('title')
    Edit istri
@endsection

@section('content')
<div class="container">
    <div class="card" style="margin-top:100px; margin-bottom:100px;">
        <div class="card-header">Edit data</div>
    
        <div class="card-body">
            <form action="/proses_update_istri/{{ $istri->id }}" method="post" enctype="multipart/form-data">
            @csrf
          
                <div class="mb-3">
                    <label for="nama_calon_istri" class="form-label fw-bold">Nama Penghulu</label>
                    <input type="text" name="nama_calon_istri" class="form-control" id="nama_calon_istri" value="{{ $istri->nama_calon_istri }}" aria-describedby="emailHelp" placeholder="Masukan Nama Penghulu">
                   @error('nama_calon_istri')
                     <p class="text-danger">{{ $message }}</p>
                   @enderror
                  </div>
                  <div class="mb-3">
                    <label for="no_ktp_istri" class="form-label fw-bold">No Ktp</label>
                    <input type="text" name="no_ktp_istri" class="form-control" id="no_ktp_istri" placeholder="Masukan No KTP" value="{{ $istri->no_ktp_istri }}">
                    @error('no_ktp_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tempat_lahir_istri" class="form-label fw-bold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_istri" class="form-control" id="tempat_lahir_istri" placeholder="Masukan Tempat Lahir" value="{{ $istri->tempat_lahir_istri }}">
                    @error('tempat_lahir_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tanggal_lahir_istri" class="form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_istri" class="form-control" id="tanggal_lahir_istri" placeholder="Masukan Tanggal Lahir" value="{{ $istri->tanggal_lahir_istri }}">
                    @error('tanggal_lahir_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="alamat_istri" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat_istri" class="form-control" id="alamat_istri" placeholder="Masukan alamat_istri" value="{{ $istri->alamat_istri }}">
                    @error('alamat_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="status_istri" class="form-label fw-bold">Status</label>
                    <input type="text" name="status_istri" class="form-control" id="status_istri" placeholder="Masukan status_istri" value="{{ $istri->status_istri }}">
                    @error('status_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="pekerjaan_istri" class="form-label fw-bold">Pekerjaan</label>
                    <input type="text" name="pekerjaan_istri" class="form-control" id="pekerjaan_istri" placeholder="Masukan pekerjaan_istri" value="{{ $istri->pekerjaan_istri }}">
                    @error('pekerjaan_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <img src="{{ url('foto_istri/'.$istri->foto_istri) }}" alt="" width="200px" height="50%">
                  </div>
                  <div class="mb-3">
                    <input type="file" name="foto_istri" class="form-input">
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