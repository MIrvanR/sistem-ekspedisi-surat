<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends BaseDashboard
{
    // ✅ PERBAIKAN DI SINI: Tipe data disesuaikan dengan standar strict Filament v3
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-home';
    
    protected static ?string $navigationLabel = 'Dashboard Utama';
    protected static ?string $title = ''; 

    public function getHeading(): string | Htmlable
    {
        $user = Auth::user();
        $namaAdmin = $user ? $user->name : 'Administrator';
        $tanggalHariIni = now()->format('d F Y');

        return new HtmlString('
            <div style="
                position: relative;
                width: 100%;
                border-radius: 1.5rem;
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
                color: white;
                padding: 2.5rem;
                overflow: hidden;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
                margin-bottom: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.1);
                animation: slideDown 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            ">
                <div style="position: absolute; top: -50%; right: -5%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(204, 26, 30, 0.2) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>
                <div style="position: absolute; bottom: -30%; left: 5%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>
                <div style="position: absolute; inset: 0; background-image: radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px); background-size: 24px 24px; pointer-events: none;"></div>

                <div style="position: relative; z-index: 10; display: flex; flex-direction: row; flex-wrap: wrap; gap: 2rem; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 1.5rem; flex: 1 1 auto;">
                        <div style="
                            width: 80px; height: 80px; 
                            border-radius: 1.25rem; 
                            background: linear-gradient(135deg, #cc1a1e 0%, #e11d48 100%);
                            display: flex; align-items: center; justify-content: center; 
                            box-shadow: 0 10px 15px -3px rgba(204, 26, 30, 0.4);
                            color: white;
                            border: 1px solid rgba(255, 255, 255, 0.2);
                        ">
                            <svg style="width: 40px; height: 40px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>

                        <div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                <span style="display: inline-block; width: 8px; height: 8px; background-color: #4ade80; border-radius: 50%; box-shadow: 0 0 10px #4ade80;"></span>
                                <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: #94a3b8;">Sistem Kendali Utama</span>
                            </div>
                            <h1 style="font-size: 2.25rem; font-weight: 900; margin: 0; line-height: 1.1; letter-spacing: -0.02em;">
                                Administrator, <span style="color: #f8fafc;">' . htmlspecialchars($namaAdmin) . '</span>
                            </h1>
                            <p style="font-size: 1rem; font-weight: 500; color: #cbd5e1; margin: 0.5rem 0 0 0; max-width: 600px;">
                                Pusat kendali E-DISPOS KPU Provinsi Bengkulu. Pantau pergerakan surat, kelola bagian, dan manajemen ekspedisi secara keseluruhan.
                            </p>
                        </div>
                    </div>

                    <div style="
                        background: rgba(255, 255, 255, 0.05);
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255, 255, 255, 0.1);
                        border-radius: 1.25rem;
                        padding: 1.25rem 1.75rem;
                        text-align: right;
                    ">
                        <span style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; display: block; margin-bottom: 0.25rem;">
                            Tanggal Sistem
                        </span>
                        <span style="font-size: 1.25rem; font-weight: 800; color: white;">
                            ' . htmlspecialchars($tanggalHariIni) . '
                        </span>
                    </div>
                </div>
            </div>
            <style>
                @keyframes slideDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
            </style>
        ');
    }
}