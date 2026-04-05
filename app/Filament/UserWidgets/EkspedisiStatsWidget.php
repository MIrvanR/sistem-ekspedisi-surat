<?php

namespace App\Filament\UserWidgets;

use App\Models\Ekspedisi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EkspedisiStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Ekspedisi', Ekspedisi::count())
                ->description('Total surat yang diekspedisi')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Surat Dikirim', Ekspedisi::where('status', 'Dikirim')->count())
                ->description('Surat dalam proses pengiriman')
                ->descriptionIcon('heroicon-m-paper-airplane')
                ->color('warning'),

            Stat::make('Surat Diterima', Ekspedisi::where('status', 'Diterima')->count())
                ->description('Surat yang sudah diterima')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
        ];
    }
}