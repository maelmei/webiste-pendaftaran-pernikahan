@extends('part_admin.inti')

@section('title')
    Edit User
@endsection

@section('content')
<div class="container">
    <div class="card" style="margin-top:100px; margin-bottom:100px;">
        <div class="card-header">Edit data</div>
    
        <div class="card-body">
            <form action="/proses_update_user/{{ $user->id }}" method="post">
            @csrf
          
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" aria-describedby="emailHelp" placeholder="Masukan Nama Penghulu">
                   @error('username')
                     <p class="text-danger">{{ $message }}</p>
                   @enderror
                  </div>
                  <div class="mb-3">
                    <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Masukan No KTP" value="{{ $user->nama_lengkap }}">
                    @error('nama_lengkap')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label fw-bold">email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Tempat Lahir" value="{{ $user->email }}">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
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