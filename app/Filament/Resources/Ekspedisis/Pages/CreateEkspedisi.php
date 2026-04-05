<?php

namespace App\Filament\Resources\Ekspedisis\Pages;

use App\Filament\Resources\Ekspedisis\EkspedisiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class CreateEkspedisi extends CreateRecord
{
    protected static string $resource = EkspedisiResource::class;

    // Fungsi ini akan berjalan tepat sebelum data masuk ke database
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Jika ada bukti_foto dan bentuknya adalah base64 dari kamera
        if (!empty($data['bukti_foto']) && str_starts_with($data['bukti_foto'], 'data:image')) {
            
            $image = $data['bukti_foto'];
            $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
            $image = str_replace(' ', '+', $image);
            
            // Buat nama file unik
            $imageName = 'bukti-ekspedisi/' . uniqid() . '.png';
            
            // Simpan gambar ke folder storage/app/public/bukti-ekspedisi
            Storage::disk('public')->put($imageName, base64_decode($image));
            
            // Ubah isi data yang akan disimpan ke database menjadi nama file
            $data['bukti_foto'] = $imageName;
        }

        return $data;
    }
}