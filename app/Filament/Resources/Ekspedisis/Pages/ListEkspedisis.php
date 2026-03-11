<?php

namespace App\Filament\Resources\Ekspedisis\Pages;

use App\Filament\Resources\Ekspedisis\EkspedisiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEkspedisis extends ListRecords
{
    protected static string $resource = EkspedisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
