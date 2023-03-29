<?php

namespace App\Exports;

use App\Models\daftarakad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class akadExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return daftarakad::all();
    }

    public function map($akad): array {
        return [
            $akad->tanggal_akad_nikah,
            $akad->waktu_akad_nikah,
            $akad->mahar_pernikahan,
            $akad->tempat_akad

        ];
    }

    public function headings(): array {
        return [
            'Tanggal Akad',
            'Waktu Akad',
            'Mahar Pernikahan',
            'Tempat Akad'
        ];
    }
}
