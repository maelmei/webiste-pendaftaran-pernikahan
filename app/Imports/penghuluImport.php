<?php

namespace App\Imports;

use App\Models\penghulu;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class penghuluImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function  model(array $rows)
    {
       
        return new penghulu([
              'id' => Str::uuid(),
                'nama_penghulu' => $rows[0],
                'gol_jabatan' => $rows[1],
                'tempat_lahir' => $rows[2],
                'tanggal_lahir' => $rows[3],
                'alamat' => $rows[4]
            ]);
    }
        
    
}
