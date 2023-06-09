@extends('layouts.inti')

@section('title')
    Akun Settings
@endsection
@section('content')
    <form class="form" method="post" action="/prosesakunuser/{{ $user->id }}" >
        @csrf
        @if(session()->has('status'))
        <p class="text-danger">{{ session('status') }}</p>
        @endif
  <label>
    <p class="label-txt">USERNAME</p>
    <input type="text" name="username" class="input" value="{{ $user->username }}">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">NAMA LENGKAP</p>
    <input type="text" name="nama_lengkap" class="input" value="{{ $user->nama_lengkap }}">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">Registration</p>
    <input type="text" name="created_at" class="input" value="{{ $user->created_at }}" readonly>
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">PASSWORD LAMA</p>
    <input type="password" name="password_lama" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">PASSWORD BARU</p>
    <input type="password" name="password" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>

  <label>
    <p class="label-txt">KONFIRMASI PASSWORD</p>
    <input type="password" name="password2" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <button type="submit" id="submit">submit</button>
</form>
@endsection

@section('css')
  <style>
  
.form {
  width: 60%;
  margin: 60px auto;
  background: #efefef;
  padding: 60px 120px 80px 120px;
  text-align: center;
  -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
  box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}
label {
  display: block;
  position: relative;
  margin: 40px 0px;
}
.label-txt {
  position: absolute;
  top: -1.6em;
  padding: 10px;
  font-family: sans-serif;
  font-size: .8em;
  letter-spacing: 1px;
  color: rgb(120,120,120);
  transition: ease .3s;
}
.input {
  width: 100%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
}

.line-box {
  position: relative;
  width: 100%;
  height: 2px;
  background: #BCBCBC;
}

.line {
  position: absolute;
  width: 0%;
  height: 2px;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  background: #8BC34A;
  transition: ease .6s;
}

.input:focus + .line-box .line {
  width: 100%;
}

.label-active {
  top: -3em;
}

#submit {
  display: inline-block;
  padding: 12px 24px;
  background: rgb(220,220,220);
  font-weight: bold;
  color: rgb(120,120,120);
  border: none;
  outline: none;
  border-radius: 3px;
  cursor: pointer;
  transition: ease .3s;
}

#submit:hover {
  background: #8BC34A;
  color: #ffffff;
}

  </style>

  <script>
    $(document).ready(function(){

$('.input').focus(function(){
  $(this).parent().find(".label-txt").addClass('label-active');
});

$(".input").focusout(function(){
  if ($(this).val() == '') {
    $(this).parent().find(".label-txt").removeClass('label-active');
  };
});

});
  </script>
@endsection