<?php

namespace App\Exports;

use App\Models\daftarakad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class istriExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return daftarakad::all();
    }
    public function headings(): array {
        return [
            'Nama Suami',
            'No KTP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Pekerjaan',
            'Status'

        ];

       
    }
    public function map($istri): array {
       
        return [
            $istri->nama_calon_istri,
            $istri->no_ktp_istri,
            $istri->tempat_lahir_istri,
            $istri->tanggal_lahir_istri,
            $istri->alamat_istri,
            $istri->pekerjaan_istri,
            $istri->status_istri
        ];
            
    }
}
