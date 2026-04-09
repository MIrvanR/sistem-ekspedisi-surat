<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    // =======================================================
    // 1. BANNER MERAH PREMIUM KHUSUS USERS/PENGGUNA
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>

                <div style="position: relative; z-index: 10;">
                    <h2 style="font-size: 1.75rem; font-weight: 900; margin: 0; letter-spacing: -0.02em;">Manajemen Pengguna</h2>
                    <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.85); margin: 0.25rem 0 0 0; font-weight: 500;">
                        Kelola akses akun admin dan staf bagian pada sistem E-DISPOS.
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
                ->label('Tambah Pengguna Baru') 
                ->icon('heroicon-o-plus-circle') 
                ->color('primary'),
        ];
    }
}