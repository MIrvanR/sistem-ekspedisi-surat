<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    protected $table = 'ekspedisi';

    protected $fillable = [
        'surat_id',
        'bagian_id',
        'tanggal_kirim',
        'tanggal_terima',
        'disposisi',
        'status',
        'bukti_foto',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }
}