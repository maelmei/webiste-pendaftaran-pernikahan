<?php

namespace App\Exports;

use App\Models\daftarakad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class suamiExport implements FromCollection, WithHeadings, WithMapping
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
    public function map($calon): array {
       
        return [
            $calon->nama_calon_suami,
            $calon->no_ktp_suami,
            $calon->tempat_lahir_suami,
            $calon->tanggal_lahir_suami,
            $calon->alamat_suami,
            $calon->pekerjaan_suami,
            $calon->status_suami
        ];
            
    }
}
