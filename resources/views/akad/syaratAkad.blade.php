@extends('layouts.inti')

@section('title')
    Syarat AKad
@endsection
@section('content')

<div id='halo' class="d-flex justify-content-center align-items-center" style="height:auto; padding-top:100px; padding-bottom:100px">
    <div class="card card-md" style="width:auto; box-shadow: 5px 10px;">
        <div class="card-header">
            <table>
                <tr>
                    <td><h3><i class="fa-sharp fa-solid fa-file"></i></h3></td>
                    <td class="ps-3 fw-bold">SYARAT AKAD</td>
                </tr>
            </table>
        </div>

        <div class="card-header" style="background-color: white !important;">
            <div class="d-flex justify-content-end"><a class="btn btn-outline-success" href='/daftarAkad'><i class="fa-solid fa-backward pe-2"></i>Kembali</a></div>
        </div>
        <div class="card-body">
            <div class="container">
                <h6 class="fw-bold">Persyaratan Calon Suami Yang Harus Di Antar Ke KUA:</h6><br>
                <ol>
                    <li>N1 (Surat Keterangan Untuk Nikah)</li>
                    <li>N2 (Surat Keterangan Asal Usul)</li>
                    <li>N3 (Surat Keterangan Tentang Orang Tua)</li>
                    <li>N4 (Surat Keterangan Persetujuan Mempelai)</li>
                    <li>Fotocopy KTP</li>
                    <li>Fotocopy KK</li>
                    <li>Fotocopy Akte Kelahiran</li>
                    <li>Pas Photo 2x3 6 Lembar</li>
                </ol>

                <h6 class="fw-bold">Persyaratan Calon Istri Yang Harus Di Antar Ke KUA:</h6><br>
                <ol>
                    <li>N1 (Surat Keterangan Untuk Nikah)</li>
                    <li>N2 (Surat Keterangan Asal Usul)</li>
                    <li>N3 (Surat Keterangan Tentang Orang Tua)</li>
                    <li>N4 (Surat Keterangan Persetujuan Mempelai)</li>
                    <li>Fotocopy KTP</li>
                    <li>Fotocopy KK</li>
                    <li>Fotocopy Akte Kelahiran</li>
                    <li>Pas Photo 2x3 6 Lembar</li>
                </ol>
                <p>Jika bertempat tinggal di Daerah Palembang. anda harus melampirkan Berkas Rekomendasi dari Desa/Lurah Setempat.</p>
                <p>Berkas Asli dari persyaratan di atas Harus di Antar Dalam jangka Waktu Paling Lambat 10 Hari Terhitung dari Mulai Mendaftar Di Kantor Urusan <br> Agama Kecamatan Gandus</p>

            </div>
        </div>
    </div>

</div>

<script>
    
</script>
@endsection