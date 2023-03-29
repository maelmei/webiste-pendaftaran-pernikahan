<!DOCTYPE html>
<head>
    <title>Contoh Surat Pernyataan</title>
    <meta charset="utf-8">
   <link rel="stylesheet" href="{{ asset('css/report.css') }}">

</head>

<body >
    <div id=halaman>
        
        <h3 id=judul>SURAT PERNYATAAN</h3>
        <p>Saya yang bertanda tangan di bawah ini :</p>
        {{-- {{ $user->tempat_lahir_suami }}, {{ $user->tanggal_lahir_suami }} {{ $user->nama_calon_suami }} --}}
        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"></td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat, tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"></td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">Kampung Sambak RT 01 RW 09 Kelurahan Danyang 
                    Kecamatan Purwodadi Kabupaten Grobogan</td>
            </tr>
            <tr>
                <td style="width: 30%;">Pekerjaan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">Guru</td>
            </tr>
        </table>

        <p>menyatakan dengan sebenar-benarnya akan bersungguh-sungguh belajar dan bekerja.</p>

        <div style="width: 50%; text-align: left; float: right;">Purwodadi, 28 Januari 2020</div><br>
        <div style="width: 50%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: right;">Arbrian Abdul Jamal</div>

    </div>
</body>

</html>