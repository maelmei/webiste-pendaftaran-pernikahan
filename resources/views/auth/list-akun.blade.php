@extends('part_admin.inti')
@section('title')
    User Banned
@endsection

@section('content')
<div class="container" style="margin-top: 100px; margin-bottom:100px;">
    <a href="/user" class="btn btn-primary mb-3 fw-bold">Kembali</a>
    {{-- <a href="/exportPenghulu" class="btn btn-warning mb-3 fw-bold">Export Data</a>
    <a href="/listakunbanned" class="btn btn-success mb-3 fw-bold">List Akun Banned</a>
     --}}
    <div class="card">
        <div class="card-header">
            User Banned
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($user as $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->level }}</td>
                        {{-- <td><a href="/edit-user/{{ $item->id }}/edit" class="btn btn-info"><span class="fa-fw select-all fas"></span></a><br>
                           
                               
                                <a href="/hapus-user/{{ $item->id }}" onclick="return confirm('Apakah anda yakin')" class="btn btn-danger mt-3"><span class="fa-fw select-all fas"></span></a>
                           
                        </td> --}}
                        {{-- <td><a href="/ban-user/{{ $item->id }}/" class="btn btn-warning"><span class="fa-fw select-all fas">💥</span></a><br> --}}
                                <a href="/unban/{{ $item->id }}" class="btn btn-success mt-3"><span class="fa-fw select-all fas">📈</span></a>
                        
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