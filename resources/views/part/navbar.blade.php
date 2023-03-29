<nav class="navbar  navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container-fluid ">
        <img src="{{ asset('img/kua.png') }}" class="me-4" alt="" srcset="" width="60px" height="50px">
      <a class="navbar-brand text-white" href="/">SIPP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="/dashboard-user">Dashboard</a>
          </li>
    
         <li class="nav-item">
          <a class="nav-link text-white" href="/daftarAkad">Daftar Akad</a>
         </li>
       
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('syaratakad') }}">Syarat Akad</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/akunuser/{{ auth()->user()->id }}">Akun Anda</a>
          </li>
        </ul>
        <div class="text-white me-4"><h5>Halo, {{ auth()->user()->nama_lengkap }}</h5></div>
        <form action="{{ route('logout') }}" method="post" class="d-flex" role="search">
        @csrf
          <button class="btn btn-outline-danger" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>