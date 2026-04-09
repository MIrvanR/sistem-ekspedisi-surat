<?php

namespace App\Filament\Resources\Bagians\Pages; // Pastikan namespace-nya sesuai

use App\Filament\Resources\Bagians\BagianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ListBagians extends ListRecords
{
    protected static string $resource = BagianResource::class;

    // =======================================================
    // 1. BANNER MERAH PREMIUM KHUSUS DIVISI/BAGIAN
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-2.25A2.25 2.25 0 0111.25 16.5h1.5a2.25 2.25 0 012.25 2.25V21" />
                    </svg>
                </div>

                <div style="position: relative; z-index: 10;">
                    <h2 style="font-size: 1.75rem; font-weight: 900; margin: 0; letter-spacing: -0.02em;">Manajemen Divisi & Bagian</h2>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.85); margin: 0.25rem 0 0 0; font-weight: 500;">
                        Kelola data unit kerja dan struktur organisasi internal instansi KPU.
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
                ->label('Tambah Bagian Baru') 
                ->icon('heroicon-o-plus-circle') 
                ->color('primary')
                ->tooltip('Klik untuk mendaftarkan divisi atau unit kerja baru'),
        ];
    }
}