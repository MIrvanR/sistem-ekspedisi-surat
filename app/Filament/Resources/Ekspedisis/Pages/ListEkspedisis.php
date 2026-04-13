<?php

namespace App\Filament\Resources\Ekspedisis\Pages;

use App\Filament\Resources\Ekspedisis\EkspedisiResource;
use Filament\Actions;
use Filament\Actions\Action; // Pastikan ini ada agar Action cetak_laporan terbaca
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ListEkspedisis extends ListRecords
{
    protected static string $resource = EkspedisiResource::class;

    // =======================================================
    // 1. BANNER MERAH PREMIUM KHUSUS EKSPEDISI
    // =======================================================
    public function getHeading(): string | Htmlable
    {
        return new HtmlString('
            <div style="
                position: relative;
                border-radius: 1.25rem;
                background: linear-gradient(135deg, #cc1a1e 0%, #e11d48 100%);
                color: white;
                padding: 1.5rem 2rem;
                box-shadow: 0 10px 15px -3px rgba(204, 26, 30, 0.3);
                overflow: hidden;
                display: flex;
                align-items: center;
                gap: 1.5rem;
                min-width: 40vw;
            ">
                <div style="position: absolute; top: -50%; right: -10%; width: 250px; height: 250px; background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>

                <div style="
                    width: 60px; height: 60px;
                    background: rgba(255, 255, 255, 0.2);
                    backdrop-filter: blur(8px);
                    border-radius: 1rem;
                    display: flex; align-items: center; justify-content: center;
                    border: 1px solid rgba(255, 255, 255, 0.3);
                    flex-shrink: 0;
                    box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.1);
                ">
                    <svg style="width: 32px; height: 32px; color: white;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                </div>

                <div style="position: relative; z-index: 10;">
                    <h2 style="font-size: 1.75rem; font-weight: 900; margin: 0; letter-spacing: -0.02em;">Manajemen Ekspedisi</h2>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.85); margin: 0.25rem 0 0 0; font-weight: 500;">
                        Pantau status pengiriman, disposisi, dan bukti fisik penerimaan dokumen.
                    </p>
                </div>
            </div>
        ');
    }

    // =======================================================
    // 2. TOMBOL AKSI UTAMA (Di Kanan Atas)
    // =======================================================
    protected function getHeaderActions(): array
    {
        return [
            // Tombol Cetak Laporan (Warna Hijau)
            Action::make('cetak_laporan')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->color('success')
                ->url(fn () => route('cetak.laporan')) // Mengarah ke route web.php
                ->openUrlInNewTab()
                ->tooltip('Klik untuk mencetak atau menyimpan laporan ke PDF'),

            // Tombol Buat Ekspedisi Baru (Warna Primary/Merah)
            Actions\CreateAction::make()
                ->label('Buat Ekspedisi Baru') 
                ->icon('heroicon-o-paper-airplane')
                ->color('primary')
                ->tooltip('Klik untuk mencatat pergerakan atau pengiriman dokumen baru'),
        ];
    }
}