<?php

namespace App\Filament\UserWidgets;

use App\Models\Ekspedisi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EkspedisiStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();
        $query = Ekspedisi::query()
            ->when(
                $user && $user->bagian_id,
                fn ($query) => $query->where('bagian_id', $user->bagian_id),
            );

        return [
            Stat::make('Total Ekspedisi', $query->count())
                ->description('Total surat yang diekspedisi')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Surat Dikirim', (clone $query)->where('status', 'Dikirim')->count())
                ->description('Surat dalam proses pengiriman')
                ->descriptionIcon('heroicon-m-paper-airplane')
                ->color('warning'),

            Stat::make('Surat Diterima', (clone $query)->where('status', 'Diterima')->count())
                ->description('Surat yang sudah diterima')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
        ];
    }
}