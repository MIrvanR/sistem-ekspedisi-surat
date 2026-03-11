<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'bagian';

    protected $fillable = [
        'nama_bagian',
        'keterangan'
    ];

    public function surats()
    {
        return $this->belongsToMany(Surat::class, 'bagian_surat');
    }
    public function ekspedisis()
    {
        return $this->hasMany(Ekspedisi::class);
    }
}
