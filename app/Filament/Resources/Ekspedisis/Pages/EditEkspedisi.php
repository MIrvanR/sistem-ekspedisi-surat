<?php

namespace App\Filament\Resources\Ekspedisis\Pages;

use App\Filament\Resources\Ekspedisis\EkspedisiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage; // Wajib ditambahkan

class EditEkspedisi extends EditRecord
{
    protected static string $resource = EkspedisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Fungsi ini mencegat data dari form Edit sebelum disimpan
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['bukti_foto']) && str_starts_with($data['bukti_foto'], 'data:image')) {
            $image = $data['bukti_foto'];
            $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
            $image = str_replace(' ', '+', $image);
            
            $imageName = 'bukti-ekspedisi/' . uniqid() . '.png';
            Storage::disk('public')->put($imageName, base64_decode($image));
            
            $data['bukti_foto'] = $imageName;
        }

        return $data;
    }
}