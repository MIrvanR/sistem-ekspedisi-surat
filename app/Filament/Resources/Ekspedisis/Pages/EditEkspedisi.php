<?php

namespace App\Filament\Resources\Ekspedisis\Pages;

use App\Filament\Resources\Ekspedisis\EkspedisiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEkspedisi extends EditRecord
{
    protected static string $resource = EkspedisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
