<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penghulu extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'nama_penghulu','gol_jabatan','tanggal_lahir','tempat_lahir','alamat','id'
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
