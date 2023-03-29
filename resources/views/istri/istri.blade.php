@extends('part_admin.inti')
@section('title')
    Data Istri
@endsection

@section('content')
<div class="container" style="margin-top: 100px; margin-bottom:100px;">
    {{-- <a href="/kua" class="btn btn-primary mb-3 fw-bold">Tambah Data</a> --}}
    <a href="/exportIstri" class="btn btn-warning mb-3 fw-bold">Export Data</a>
    <div class="card">
        <div class="card-header">
            Data istri
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Calon</th>
                        <th>No KTP</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Status</th>
                        <th>foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($istri as $calon )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $calon->nama_calon_istri }}</td>
                        <td>{{ $calon->no_ktp_istri }}</td>
                        <td>{{ $calon->tempat_lahir_istri }}</td>
                        <td>{{ $calon->tanggal_lahir_istri }}</td>
                        <td>{{ $calon->alamat_istri }}</td>
                        <td>{{ $calon->pekerjaan_istri }}</td>
                        <td>{{ $calon->status_istri }}</td>
                        <td><img src="{{ url('foto_istri/'.$calon->foto_istri) }}" width="100px" height="80%" alt=""></td>
                        <td><a href="/edit_istri/{{ $calon->id }}/edit" class="btn btn-info"><span class="fa-fw select-all fas"></span></a><br>
                            {{-- <form action="/hapus_istri/{{ $calon->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin')" class="btn btn-danger mt-3"><span class="fa-fw select-all fas"></span></button>
                            </form> --}}
                            <a href="/hapus_istri/{{ $calon->id }}/{{ $calon->user_id }}" class="btn btn-danger mt-3"><span class="fa-fw select-all fas"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
  </div>
  @include('sweetalert::alert')
  <script>
      $(document).ready( function () {
      $('#table_id').DataTable();
      } );
  </script>
@endsection

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection