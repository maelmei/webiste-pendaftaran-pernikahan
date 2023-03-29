<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class daftarakad extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_akad_nikah'])->translatedFormat('l, d F Y');
    }
    protected $guarded = ['created_at'];
    public function penghulu ()
    {
        return $this->belongsTo(penghulu::class, 'nama_penghulu', 'id');
    }

    public function uset()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
