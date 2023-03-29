@extends('part_admin.inti')

@section('title')
Akad
@endsection


@section('content')
<div class="container" style="margin-top: 100px; margin-bottom:100px;">
    <a href="/kua" class="btn btn-primary mb-3 fw-bold">Tambah Data</a>
    <a href="/akadExport" class="btn btn-warning mb-3 fw-bold">Export Data</a>
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
                        <th>Tanggal Akad</th>
                        <th>Waktu Akad</th>
                        <th>Mahar Pernikahan</th>
                        <th>Tempat Akad</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($akad as $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_akad_nikah }}</td>
                        <td>{{ $item->waktu_akad_nikah }}</td>
                        <td>{{ $item->mahar_pernikahan }}</td>
                        <td>{{ $item->tempat_akad }}</td>
                        <td>
                            @if($item->status == 'Belum Terverifikasi')
                            
                            <span class="badge rounded-pill bg-warning">{{ $item->status }}</span></td>
                            @elseif($item->status == 'Kurang Item')
                            <span class="badge rounded-pill bg-danger">{{ $item->status }}</span></td>
                            @elseif($item->status == 'Sudah Terverifikasi')
                            <span class="badge rounded-pill bg-success">{{ $item->status }}</span></td>
                            @elseif($item->status == 'Update')
                            <span class="badge rounded-pill bg-info">{{ $item->status }}</span></td>
                            @endif
                            <td>
                            <a href="/editakaduser/{{ $item->id }}/edit" class="btn btn-info"><span class="fa-fw select-all fas"></span></a><br>
                           
                                <a href="/hapusakaduser/{{ $item->id }}/{{ $item->user_id }}" onclick="return confirm('Apakah anda yakin')" class="btn btn-danger mt-3"><span class="fa-fw select-all fas"></span></a><br>
                           <a href="updateakaduser/{{ $item->id }}/{{ $item->user_id }}" class="btn btn-success mt-3"><i class="fa fa-check"  style="font-size:21px"></i></a>
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