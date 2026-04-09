<?php

namespace App\Filament\Resources\Surats\Pages; // Sesuaikan jika namespace kamu berbeda

use App\Filament\Resources\Surats\SuratResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ListSurats extends ListRecords
{
    protected static string $resource = SuratResource::class;

    // =======================================================
    // 1. BANNER MERAH PREMIUM SEKALIGUS FIX IKON RAKSASA
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
                min-width: 40vw; /* Agar kotaknya proporsional */
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                    </svg>
                </div>

                <div style="position: relative; z-index: 10;">
                    <h2 style="font-size: 1.75rem; font-weight: 900; margin: 0; letter-spacing: -0.02em;">Pusat Manajemen Surat</h2>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.85); margin: 0.25rem 0 0 0; font-weight: 500;">
                        Kelola dan pantau seluruh arus dokumen instansi.
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
            Actions\CreateAction::make()
                ->label('Registrasi Surat Baru') 
                ->icon('heroicon-o-plus-circle') 
                ->color('primary')
                ->tooltip('Klik untuk mendaftarkan dokumen baru ke dalam sistem'),
        ];
    }
}