@extends('part_admin.inti')

@section('title')
    Penghulu
@endsection

@section('content')

<div class="container" style="margin-top: 100px; margin-bottom:100px;">
    <a href="/kua" class="btn btn-primary mb-3 fw-bold">Tambah Data</a>
    <a href="/exportPenghulu" class="btn btn-warning mb-3 fw-bold">Export Data</a>
    <form action="importPenghulu" class="my-3" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name='penghuluImport' style="display: inline">
        <button class="btn btn-primary fw-bold buton" type="submit">Import</button>

    </form>
    <div class="card">
        <div class="card-header">
            Penghulu
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penghulu</th>
                        <th>Gol Jabatan</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($penghulu2 as $penghulu )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penghulu->nama_penghulu }}</td>
                        <td>{{ $penghulu->gol_jabatan }}</td>
                        <td>{{ $penghulu->tempat_lahir }}</td>
                        <td>{{ $penghulu->tanggal_lahir }}</td>
                        <td>{{ $penghulu->alamat }}</td>
                        <td><a href="/kua/{{ $penghulu->id }}/edit" class="btn btn-info"><span class="fa-fw select-all fas"></span></a><br>
                            <form action="/kua/{{ $penghulu->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin')" class="btn btn-danger mt-3"><span class="fa-fw select-all fas"></span></button>
                            </form>
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
</style>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection