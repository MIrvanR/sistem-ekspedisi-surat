<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Bagian;
use App\Models\Ekspedisi;
use App\Models\Surat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsOverview extends BaseWidget
{
    // ✅ PERBAIKAN: Kata "static" sudah dihapus!
    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        return [
            // 1. KOTAK SURAT (Merah)
            Stat::make('Total Surat', Surat::count())
                ->description('Seluruh dokumen terdaftar')
                ->descriptionIcon('heroicon-m-document-text')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),

            // 2. KOTAK EKSPEDISI (Hijau)
            Stat::make('Total Ekspedisi', Ekspedisi::count())
                ->description('Proses pergerakan / disposisi')
                ->descriptionIcon('heroicon-m-truck')
                ->chart([3, 5, 2, 8, 14, 7, 10])
                ->color('success'),

            // 3. KOTAK BAGIAN (Biru)
            Stat::make('Divisi / Bagian', Bagian::count())
                ->description('Unit kerja instansi')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->chart([1, 2, 2, 3, 3, 4, 4])
                ->color('info'),

            // 4. KOTAK USER (Oranye)
            Stat::make('Pengguna Sistem', User::count())
                ->description('Admin dan user aktif')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
        ];
    }
}