<?php

namespace App\Filament\UserResources\UserDashboardResource\Pages;

use App\Filament\UserResources\UserDashboardResource;
use Filament\Resources\Pages\ListRecords;

class ListUserDashboards extends ListRecords
{
    protected static string $resource = UserDashboardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // User tidak bisa create/edit ekspedisi, hanya view
        ];
    }
}