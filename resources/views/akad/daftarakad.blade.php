@extends('layouts.inti')

@section('title')
    Daftar
@endsection
@section('content')

<div class="container" style="margin-top: 80px; margin-bottom:100px;">
    
  <form action="akad" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-6">
          <div class="mb-3">
              <label for="nama_calon_suami" class="form-label fw-bold">Nama Calon Suami</label>
              <input type="text" name="nama_calon_suami" value='{{ old("nama_calon_suami") }}' class="form-control" id="nama_calon_suami" aria-describedby="emailHelp" placeholder="Masukan Nama Calon Suami">
             @error('nama_calon_suami')
               <p class="text-danger">{{ $message }}</p>
             @enderror
            </div>
            <div class="mb-3">
              <label for="no_ktp_suami" class="form-label fw-bold">No KTP Calon Suami</label>
              <input type="text" name="no_ktp_suami" value='{{ old("no_ktp_suami") }}' class="form-control" id="no_ktp_suami" placeholder="Masukan No KTP">
              @error('no_ktp_suami')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <label for="tempat_lahir_suami" class="form-label fw-bold">Tempat Lahir</label>
              <input type="text" name="tempat_lahir_suami" value='{{ old("tempat_lahir_suami") }}' class="form-control" id="tempat_lahir_suami"  placeholder="Masukan Tempat Lahir">
              @error('tempat_lahir_suami')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <label for="tanggal_lahir_suami" class="form-label fw-bold">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir_suami" value='{{ old("tanggal_lahir_suami") }}' class="form-control" id="tanggal_lahir_suami"  placeholder="Masukan Tempat Lahir">
              @error('tanggal_lahir_suami')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <div class="form-floating">
                <div>  <label for="alamat_suami" class="form-label fw-bold">Alamat</label></div>
                    <textarea name="alamat_suami" class="form-control" placeholder="Leave a comment here" id="alamat_suami">{{ old("alamat_suami") }}</textarea>
                    @error('alamat_suami')
              <p class="text-danger">{{ $message }}</p>
            @enderror
                  </div>
            </div>

            <div class="mb-3">
                <label for="pekerjaan_suami" class="form-label fw-bold">Pekerjaan</label>
                <input type="text" name="pekerjaan_suami" value='{{ old("pekerjaan_suami") }}'  class="form-control" id="pekerjaan_suami"  placeholder="Masukan Pekerjaan">
                @error('pekerjaan_suami')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
            <div class="mb-3">
                <label for="pekerjaan_suami" class="form-label fw-bold">Status</label>
                <select name='status_suami' class="form-select" aria-label="Default select example">
                  
                    <option value="jejaka">jejaka</option>
                    <option value="perawan">perawan</option>
                    <option value="duda">duda</option>
                    <option value="janda">janda</option>
             
                  </select>
                  @error('status_suami')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="pekerjaan_suami" class="form-label fw-bold">Upload Foto Suami</label><br>
                  <input type="file" onchange="previewImage()" name="foto_suami">
                  @error('foto_suami')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <img id="preview" src="#" alt="Pratinjau Gambar" style="max-width: 100px;"><br>
              </div>
      </div>
      <div class="col-md-6">
          <div class="mb-3">
              <label for="nama_calon_istri" class="form-label fw-bold">Nama Calon istri</label>
              <input type="text" name="nama_calon_istri" value='{{ old("nama_calon_istri") }}' class="form-control" id="nama_calon_istri" aria-describedby="emailHelp" placeholder="Masukan Nama Calon istri">
              @error('nama_calon_istri')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <label for="no_ktp_istri" class="form-label fw-bold">No KTP Calon istri</label>
              <input type="text" name="no_ktp_istri" value='{{ old("no_ktp_istri") }}' class="form-control" id="no_ktp_istri" placeholder="Masukan No KTP">
              @error('no_ktp_istri')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <label for="tempat_lahir_istri" class="form-label fw-bold">Tempat Lahir</label>
              <input type="text" name="tempat_lahir_istri" value='{{ old("tempat_lahir_istri") }}' class="form-control" id="tempat_lahir_istri"  placeholder="Masukan Tempat Lahir">
              @error('tempat_lahir_istri')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <label for="tanggal_lahir_istri" class="form-label fw-bold">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir_istri" value='{{ old("tanggal_lahir_istri") }}' class="form-control" id="tanggal_lahir_istri"  placeholder="Masukan Tempat Lahir">
              @error('tanggal_lahir_istri')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <div class="form-floating">
                    <div>  <label for="alamat_istri" class="form-label fw-bold">Alamat</label></div>
                    <textarea name="alamat_istri" class="form-control" placeholder="Leave a comment here" id="alamat_istri">{{ old("alamat_istri") }}</textarea>
                    @error('alamat_istri')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
            </div>

            <div class="mb-3">
                <label for="pekerjaan_istri" class="form-label fw-bold">Pekerjaan</label>
                <input type="text" name='pekerjaan_istri' value='{{ old("pekerjaan_istri") }}' class="form-control" id="pekerjaan_istri"  placeholder="Masukan Pekerjaan">
                @error('pekerjaan_istri')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
            <div class="mb-3">
              <label for="status_istri" class="form-label fw-bold">Status</label>
              <select class="form-select" name="status_istri" aria-label="Default select example" id="status_istri">
                  
                  <option value="perawan">perawan</option>
                  <option value="jejaka">jejaka</option>
                    <option value="duda">duda</option>
                    <option value="janda">janda</option>
             
                  </select>
                  @error('status_istri')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="pekerjaan_istri" class="form-label fw-bold">Upload Foto istri</label><br>
                  <input type="file" onchange="previewImageIstri()" name='foto_istri'>
                  @error('foto_istri')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                  <img id="preview2" src="#" alt="Pratinjau Gambar" style="max-width: 100px;"><br>
                </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md">
          <div class="mb-3">
              <label for="pekerjaan_istri" class="form-label fw-bold">Nama Penghulu</label>
              <select class="form-select" name="nama_penghulu" aria-label="Default select example" id="nama_penghulu">
                <option selected disabled>Silahkan Pilih </option>
                @foreach($penghulu as $key)
                  
                <option value="{{ $key->id }}">{{ $key->nama_penghulu }}</option>
                
                @endforeach
           
                </select>
                @error('nama_penghulu')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
              <div class="mb-3">
              <label for="tanggal_akad_nikah" class="form-label fw-bold">Tanggal Akad Nikah</label>
              <input type="date" name="tanggal_akad_nikah" value="{{ old('tanggal_akad_nikah') }}" class="form-control" id="tanggal_akad_nikah"  placeholder="Masukan Pekerjaan">
              @error('tanggal_akad_nikah')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-3">
              <label for="waktu_akad_nikah" class="form-label fw-bold">Waktu Akad Nikah</label>
              <input type="time" name="waktu_akad_nikah" value="{{ old('waktu_akad_nikah') }}"  class="form-control" id="waktu_akad_nikah"  placeholder="Masukan Pekerjaan">
              @error('waktu_akad_nikah')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <label for="mahar_pernikahan" class="form-label fw-bold">Mahar Pernikahan</label>
              <input type="text" name="mahar_pernikahan" value="{{ old('mahar_pernikahan') }}" class="form-control" id="mahar_pernikahan"  placeholder="Masukan Mahar dari Pernikahan Calon Kedua Mempelai">
              @error('mahar_pernikahan')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
              <label for="tempat_akad" class="form-label fw-bold">Tempat Pelaksanaan Akad</label>
              <input type="text" name="tempat_akad" value="{{ old('tempat_akad') }}" class="form-control" id="tempat_akad"  placeholder="Masukan Tempat Akad">
              @error('tempat_akad')
              <p class="text-danger">{{ $message }}</p>
            @enderror

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" >
            <input type="hidden" name="cek_id" value="{{ auth()->user()->id }}">
            </div>
      </div>
  </div>
  <div class="d-flex justify-content-center">

    <button type="submit" class="btn btn-primary">Register</button>
  </div>
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