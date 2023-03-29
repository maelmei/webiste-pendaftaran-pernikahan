@extends('part_admin.inti')


@section('title')
    data suami
@endsection 
@section('content')

<div class="container" style="margin-top: 100px; margin-bottom:100px;">
  {{-- <a href="/kua" class="btn btn-primary mb-3 fw-bold">Tambah Data</a> --}}
  <a href="/exportSuami" class="btn btn-warning mb-3 fw-bold">Export Data</a>
  <div class="card">
      <div class="card-header">
          Data Suami
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
                      <th>Akun Email</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  
                  @foreach ($suami as $calon )
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $calon->nama_calon_suami }}</td>
                      <td>{{ $calon->no_ktp_suami }}</td>
                      <td>{{ $calon->tempat_lahir_suami }}</td>
                      <td>{{ $calon->tanggal_lahir_suami }}</td>
                      <td>{{ $calon->alamat_suami }}</td>
                      <td>{{ $calon->pekerjaan_suami }}</td>
                      <td>{{ $calon->status_suami }}</td>
                      <td><img src="{{ url('foto_suami/'.$calon->foto_suami) }}" width="100px" height="80%" alt=""></td>
                      <td>{{ $calon->uset['email'] }}</td>
                      <td><a href="/edit_suami/{{ $calon->id }}/edit" class="btn btn-info"><span class="fa-fw select-all fas"></span></a><br>
                          {{-- <form action="/hapus_suami/{{ $calon->id }}" method="post">
                              @method('delete')
                              @csrf
                              <button type="submit" onclick="return confirm('Apakah anda yakin')" class="btn btn-danger mt-3"><span class="fa-fw select-all fas"></span></button>
                          </form> --}}
                          <a href="/hapus_suami/{{ $calon->id }}/{{ $calon->user_id }}" class="btn btn-danger mt-3"><span class="fa-fw select-all fas"></span></a>
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