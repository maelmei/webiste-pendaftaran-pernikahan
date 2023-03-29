@extends('part_admin.inti')

@section('title')
    Edit User
@endsection

@section('content')
<div class="container">
    <div class="card" style="margin-top:100px; margin-bottom:100px;">
        <div class="card-header">Banned Akun</div>
    
        <div class="card-body">
            <form action="/proses_banned_user/{{ $user->id }}" method="post">
            @csrf
          
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" aria-describedby="emailHelp" placeholder="Masukan Nama Penghulu" readonly>
                   @error('username')
                     <p class="text-danger">{{ $message }}</p>
                   @enderror
                  </div>
                  <div class="mb-3">
                    <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Masukan No KTP" value="{{ $user->nama_lengkap }}" readonly>
                    @error('nama_lengkap')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label fw-bold">email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Tempat Lahir" value="{{ $user->email }}" readonly>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="banned" class="form-label fw-bold">Berapa Hari Banned</label>
                    <select name="banned" id="" class="form-control">
                        <option selected>Silahkan Pilih </option>
                        <option value="1 day">1 day</option>
                        <option value="2 days">2 days</option>
                        <option value="3 days">3 days</option>
                    </select>
                
                  </div>
                 
                  <div class="d-flex justify-content-center">
                  <button class="btn btn-primary " type="submit">Kirim</button>
                  <a class="btn btn-warning ms-3" href="/user">Kembali</a>
                </div>

               
            </form>
        </div>
    </div>
    </div>
@endsection