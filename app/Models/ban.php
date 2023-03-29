<?php

namespace App\Models;
use Mchev\Banhammer\Traits\Bannable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ban extends Model
{
    use HasFactory, Bannable;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['metas'];

    public function baned()
    {
       return $this->belongsTo(User::class, 'bannable_id', 'id');
    }
}
