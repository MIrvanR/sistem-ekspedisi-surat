<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'tanggal_masuk',
        'pengirim',
        'perihal',
        'sifat',
        'disposisi',
        'file_surat'
    ];
    
    public function bagians()
    {
        return $this->belongsToMany(Bagian::class, 'bagian_surat');
    }

    public function ekspedisis()
    {
        return $this->hasMany(Ekspedisi::class);
    }
}
