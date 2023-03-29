<?php

namespace App\Exports;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class userExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return User::all();
    }

    public function map($user):array {
        return[
            $user->username,
            $user->nama_lengkap,
            $user->email,
            $user->level
        ];
    }

    public function headings():array {
        return [
            'Username',
            'Nama Lengkap',
            'Email',
            'Level'
        ];
    }
}
