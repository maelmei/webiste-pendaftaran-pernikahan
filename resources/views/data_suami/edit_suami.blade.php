@extends('part_admin.inti')

@section('title')
    Edit Suami
@endsection

@section('content')
<div class="container">
    <div class="card" style="margin-top:100px; margin-bottom:100px;">
        <div class="card-header">Edit data</div>
    
        <div class="card-body">
            <form action="/proses_update_suami/{{ $suami->id }}" method="post" enctype="multipart/form-data">
            @csrf
          
                <div class="mb-3">
                    <label for="nama_calon_suami" class="form-label fw-bold">Nama Penghulu</label>
                    <input type="text" name="nama_calon_suami" class="form-control" id="nama_calon_suami" value="{{ $suami->nama_calon_suami }}" aria-describedby="emailHelp" placeholder="Masukan Nama Penghulu">
                   @error('nama_calon_suami')
                     <p class="text-danger">{{ $message }}</p>
                   @enderror
                  </div>
                  <div class="mb-3">
                    <label for="no_ktp_suami" class="form-label fw-bold">No Ktp</label>
                    <input type="text" name="no_ktp_suami" class="form-control" id="no_ktp_suami" placeholder="Masukan No KTP" value="{{ $suami->no_ktp_suami }}">
                    @error('no_ktp_suami')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tempat_lahir_suami" class="form-label fw-bold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_suami" class="form-control" id="tempat_lahir_suami" placeholder="Masukan Tempat Lahir" value="{{ $suami->tempat_lahir_suami }}">
                    @error('tempat_lahir_suami')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tanggal_lahir_suami" class="form-label fw-bold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_suami" class="form-control" id="tanggal_lahir_suami" placeholder="Masukan Tanggal Lahir" value="{{ $suami->tanggal_lahir_suami }}">
                    @error('tanggal_lahir_suami')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="alamat_suami" class="form-label fw-bold">Alamat</label>
                    <input type="text" name="alamat_suami" class="form-control" id="alamat_suami" placeholder="Masukan alamat_suami" value="{{ $suami->alamat_suami }}">
                    @error('alamat_suami')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="status_suami" class="form-label fw-bold">Status</label>
                    <input type="text" name="status_suami" class="form-control" id="status_suami" placeholder="Masukan status_suami" value="{{ $suami->status_suami }}">
                    @error('status_suami')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="pekerjaan_suami" class="form-label fw-bold">Pekerjaan</label>
                    <input type="text" name="pekerjaan_suami" class="form-control" id="pekerjaan_suami" placeholder="Masukan pekerjaan_suami" value="{{ $suami->pekerjaan_suami }}">
                    @error('pekerjaan_suami')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <img src="{{ url('foto_suami/'.$suami->foto_suami) }}" alt="" width="200px" height="50%">
                  </div>
                  <div class="mb-3">
                    <input type="file" name="foto_suami" class="form-input">
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