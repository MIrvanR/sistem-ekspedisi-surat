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

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {

            if (!empty($model->bukti_foto) && str_starts_with($model->bukti_foto, 'data:image')) {

                $image = $model->bukti_foto;

                $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
                $image = str_replace(' ', '+', $image);

                $imageName = 'bukti-ekspedisi/' . uniqid() . '.png';

                \Storage::disk('public')->put($imageName, base64_decode($image));

                $model->bukti_foto = $imageName;
            }
        });
    }
}