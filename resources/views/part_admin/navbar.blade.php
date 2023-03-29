<nav class="navbar  navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container-fluid ">
        <img src="{{ asset('img/kua.png') }}" class="me-4" alt="" srcset="" width="60px" height="50px">
      <a class="navbar-brand text-white" href="/admin">SIPP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{ route('adminkua') }}">Dashboard</a>
          </li>
    
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Masterdata
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/datasuami">Data Suami</a></li>
              <li><a class="dropdown-item" href="/dataistri">Data Istri</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/akad_admin">Data Akad</a></li>
            </ul>
          </li>
       
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('penghulu') }}">Penghulu</a>
          </li>
        </ul>
        <div class="text-white me-4"><h5>Halo, {{ auth()->user()->name }}</h5></div>
        <form action="{{ route('logout') }}" method="post" class="d-flex" role="search">
        @csrf
          <button class="btn btn-outline-danger" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>