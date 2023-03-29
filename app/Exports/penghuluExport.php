<?php

namespace App\Exports;

use App\Models\penghulu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class penghuluExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return penghulu::all();
    }

    public function headings(): array {

        return [
            'Nama penghulu',
            'Golongan Jabatan',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat'
        ];
    }

    public function map($penghulu): array 
    {
        return [
            $penghulu->nama_penghulu,
            $penghulu->gol_jabatan,
            $penghulu->tempat_lahir,
            $penghulu->tanggal_lahir,
            $penghulu->alamat 
        ];
    }
}
