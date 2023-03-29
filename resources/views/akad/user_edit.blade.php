@extends('layouts.inti')

@section('title')
User Edit
@endsection

@section('content')

<div class="container" style="margin-top: 80px; margin-bottom:100px;">
    
    <form action="/proses_edit_users/{{ $user->id }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nama_calon_suami" class="form-label fw-bold">Nama Calon Suami</label>
                <input type="text"  value="{{ $user->nama_calon_suami }}" name="nama_calon_suami" class="form-control" id="nama_calon_suami" aria-describedby="emailHelp" placeholder="Masukan Nama Calon Suami">
               @error('nama_calon_suami')
                 <p class="text-danger">{{ $message }}</p>
               @enderror
              </div>
              <div class="mb-3">
                <label for="no_ktp_suami" class="form-label fw-bold">No KTP Calon Suami</label>
                <input type="text"  name="no_ktp_suami" value="{{ $user->no_ktp_suami }}" class="form-control" id="no_ktp_suami" placeholder="Masukan No KTP">
                @error('no_ktp_suami')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <label for="tempat_lahir_suami" class="form-label fw-bold">Tempat Lahir</label>
                <input type="text"  name="tempat_lahir_suami" value="{{ $user->tempat_lahir_suami }}" class="form-control" id="tempat_lahir_suami"  placeholder="Masukan Tempat Lahir">
                @error('tempat_lahir_suami')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir_suami" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date"  name="tanggal_lahir_suami" value="{{ $user->tanggal_lahir_suami }}" class="form-control" id="tanggal_lahir_suami"  placeholder="Masukan Tempat Lahir">
                @error('tanggal_lahir_suami')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <div class="form-floating">
                  <div>  <label for="alamat_suami" class="form-label fw-bold">Alamat</label></div>
                      <textarea name="alamat_suami"   class="form-control" placeholder="Leave a comment here" id="alamat_suami">{{ $user->alamat_suami }}</textarea>
                      @error('alamat_suami')
                <p class="text-danger">{{ $message }}</p>
              @enderror
                    </div>
              </div>
  
              <div class="mb-3">
                  <label for="pekerjaan_suami" class="form-label fw-bold">Pekerjaan</label>
                  <input type="text"  name="pekerjaan_suami" value="{{ $user->pekerjaan_suami }}" class="form-control" id="pekerjaan_suami"  placeholder="Masukan Pekerjaan">
                  @error('pekerjaan_suami')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
              <div class="mb-3">
                  <label for="pekerjaan_suami" class="form-label fw-bold">Status</label>
                    <input type="text"  class="form-control" name="status_suami" value="{{ $user->status_suami }}">
                    @error('status_suami')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_suami" class="form-label fw-bold">Foto Suami</label><br>
                    <input type="file" onchange="previewImage()" name="foto_suami">
                    @error('foto_suami')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <img id="preview" src="#" alt="Pratinjau Gambar" style="max-width: 100px;"><br>
                  <img src="{{ url('foto_suami/'.$user->foto_suami) }}" alt="s" srcset="" width="120px" height="100px">
                </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nama_calon_istri" class="form-label fw-bold">Nama Calon istri</label>
                <input type="text"  value="{{ $user->nama_calon_istri }}" name="nama_calon_istri" class="form-control" id="nama_calon_istri" aria-describedby="emailHelp" placeholder="Masukan Nama Calon istri">
                @error('nama_calon_istri')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <label for="no_ktp_istri" class="form-label fw-bold">No KTP Calon istri</label>
                <input type="text"  name="no_ktp_istri" value="{{ $user->no_ktp_istri }}" class="form-control" id="no_ktp_istri" placeholder="Masukan No KTP">
                @error('no_ktp_istri')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <label for="tempat_lahir_istri" class="form-label fw-bold">Tempat Lahir</label>
                <input type="text"  value="{{ $user->tempat_lahir_istri }}" name="tempat_lahir_istri" class="form-control" id="tempat_lahir_istri"  placeholder="Masukan Tempat Lahir">
                @error('tempat_lahir_istri')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir_istri" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" v value="{{ $user->tanggal_lahir_istri }}" name="tanggal_lahir_istri" class="form-control" id="tanggal_lahir_istri"  placeholder="Masukan Tempat Lahir">
                @error('tanggal_lahir_istri')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <div class="form-floating">
                      <div>  <label for="alamat_istri" class="form-label fw-bold">Alamat</label></div>
                      <textarea  name="alamat_istri" class="form-control" placeholder="Leave a comment here" id="alamat_istri">{{ $user->alamat_istri }}</textarea>
                      @error('alamat_istri')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
              </div>
  
              <div class="mb-3">
                  <label for="pekerjaan_istri" class="form-label fw-bold">Pekerjaan</label>
                  <input  type="text" name='pekerjaan_istri' value="{{ $user->pekerjaan_istri }}" class="form-control" id="pekerjaan_istri"  placeholder="Masukan Pekerjaan">
                  @error('pekerjaan_istri')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
              <div class="mb-3">
                <label for="status_istri" class="form-label fw-bold">Status</label>
                    <input  type="text" class="form-control" name="status_istri" value="{{ $user->status_istri }}">
                    @error('status_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_istri" class="form-label fw-bold">Foto istri</label><br>
                    <input type="file" onchange="previewImageIstri()" name='foto_istri'>
                    @error('foto_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                    <img id="preview2" src="#" alt="Pratinjau Gambar" style="max-width: 100px;"><br>
                  </div>
                  <img src="{{ url('foto_istri/'.$user->foto_istri) }}" alt="s" srcset="" width="120px" height="100px">
      </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="mb-3">
                <label for="pekerjaan_istri" class="form-label fw-bold">Nama Penghulu</label>
                <input  type="text" class="form-control" value="{{ $user->penghulu['nama_penghulu'] }}" name="nama_penghulu" readonly>
                  @error('nama_penghulu')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                <label for="tanggal_akad_nikah" class="form-label fw-bold">Tanggal Akad Nikah</label>
                <input type="date" value="{{ $user->tanggal_akad_nikah }}"  name="tanggal_akad_nikah" class="form-control" id="tanggal_akad_nikah"  placeholder="Masukan Pekerjaan">
                @error('tanggal_akad_nikah')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
  
              <div class="mb-3">
                <label for="waktu_akad_nikah" class="form-label fw-bold">Waktu Akad Nikah</label>
                <input type="time" value="{{ $user->waktu_akad_nikah }}"  name="waktu_akad_nikah" class="form-control" id="waktu_akad_nikah"  placeholder="Masukan Pekerjaan">
                @error('waktu_akad_nikah')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <label for="mahar_pernikahan" class="form-label fw-bold">Mahar Pernikahan</label>
                <input type="text" value="{{ $user->mahar_pernikahan }}"  name="mahar_pernikahan" class="form-control" id="mahar_pernikahan"  placeholder="Masukan Mahar dari Pernikahan Calon Kedua Mempelai">
                @error('mahar_pernikahan')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
                <label for="tempat_akad" class="form-label fw-bold">Tempat Pelaksanaan Akad</label>
                <input type="text" value="{{ $user->tempat_akad }}"  name="tempat_akad" class="form-control" id="tempat_akad"  placeholder="Masukan Tempat Akad">
                @error('tempat_akad')
                <p class="text-danger">{{ $message }}</p>
              @enderror
  
              <input type="hidden" name="user_id" value="{{ $user->user_id }}" >
              <input type="hidden" name="cek_id" value="{{ auth()->user()->id }}">

        
              </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
  
      <button type="submit" class="btn btn-primary">Kirim</button>
      <a href="/dashboard-user" class="btn btn-warning ms-4">Kembali</a>
    </div>
    </form>    
  <script>
       function previewImage() {
          var reader = new FileReader();
          reader.onload = () => {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
          }
          reader.readAsDataURL(event.target.files[0]);
        }
  
        if(!previewImage()){
          document.getElementById('preview').style.display = 'none'
        }
        function previewImageIstri()  {
         var reader = new FileReader();
          reader.onload = () => {
            var preview = document.getElementById('preview2');
            preview.src = reader.result;
          }
          reader.readAsDataURL(event.target.files[0]);
      }
     
  </script>

@endsection

@section('css')

@endsection