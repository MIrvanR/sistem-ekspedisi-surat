<?php

namespace App\Filament\UserPages;

use Filament\Pages\Dashboard;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Dashboard
{
    protected static ?string $navigationLabel = 'Dashboard Utama';
    protected static ?string $title = ''; 

    public function getHeading(): string | Htmlable
    {
        $user = Auth::user();
        $namaUser = $user ? $user->name : 'Tim Internal';
        $tanggalHariIni = now()->format('d F Y');

        return new HtmlString('
            <div class="custom-hero-banner" style="
                position: relative;
                width: 100%;
                border-radius: 1.5rem;
                background: linear-gradient(135deg, #b3171a 0%, #e11d48 100%);
                color: white;
                padding: 2.5rem;
                overflow: hidden;
                box-shadow: 0 20px 25px -5px rgba(220, 38, 38, 0.25), 0 8px 10px -6px rgba(220, 38, 38, 0.1);
                margin-bottom: 2rem;
                animation: slideDown 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
                border: 1px solid rgba(255, 255, 255, 0.15);
            ">
                <div style="position: absolute; top: -50%; right: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>
                <div style="position: absolute; bottom: -30%; left: 5%; width: 300px; height: 300px; background: radial-gradient(circle, rgba(0,0,0,0.15) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>
                <div style="position: absolute; inset: 0; background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px); background-size: 24px 24px; opacity: 0.3; pointer-events: none;"></div>

                <div style="position: relative; z-index: 10; display: flex; flex-direction: row; flex-wrap: wrap; gap: 2rem; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 1.5rem; flex: 1 1 auto;">
                        <div style="
                            width: 85px; height: 85px; 
                            border-radius: 1.25rem; 
                            background: rgba(255, 255, 255, 0.15); 
                            backdrop-filter: blur(12px); 
                            -webkit-backdrop-filter: blur(12px);
                            display: flex; align-items: center; justify-content: center; 
                            border: 1px solid rgba(255, 255, 255, 0.3);
                            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), inset 0 0 15px rgba(255, 255, 255, 0.1);
                        ">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg" alt="KPU Logo" style="width: 58px; height: auto; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));">
                        </div>

                        <div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                <span style="display: inline-block; width: 8px; height: 8px; background-color: #4ade80; border-radius: 50%; box-shadow: 0 0 10px #4ade80; animation: pulseGlow 2s infinite;"></span>
                                <span style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.15em; color: rgba(255, 255, 255, 0.85);">Sistem Aktif & Aman</span>
                            </div>
                            <h1 style="font-size: 2rem; font-weight: 900; margin: 0; line-height: 1.1; letter-spacing: -0.02em;">
                                Selamat Bertugas, <span style="color: #ffe4e6;">' . htmlspecialchars($namaUser) . '</span>
                            </h1>
                            <p style="font-size: 0.95rem; font-weight: 500; color: rgba(255, 255, 255, 0.85); margin: 0.4rem 0 0 0; max-width: 550px;">
                                Akses cepat ke seluruh dokumen disposisi Anda. Pantau dan kelola surat yang masuk hari ini dengan mudah.
                            </p>
                        </div>
                    </div>

                    <div style="
                        background: rgba(0, 0, 0, 0.2);
                        backdrop-filter: blur(10px);
                        -webkit-backdrop-filter: blur(10px);
                        border: 1px solid rgba(255, 255, 255, 0.15);
                        border-radius: 1.25rem;
                        padding: 1.25rem 1.75rem;
                        display: flex;
                        flex-direction: column;
                        align-items: flex-end;
                        box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.05);
                    ">
                        <span style="font-size: 0.7rem; color: rgba(255, 255, 255, 0.7); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; display: flex; gap: 0.4rem; align-items: center;">
                            <svg style="width: 14px; height: 14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Tanggal Hari Ini
                        </span>
                        <span style="font-size: 1.25rem; font-weight: 800; color: white; margin-top: 0.25rem; letter-spacing: -0.01em;">
                            ' . htmlspecialchars($tanggalHariIni) . '
                        </span>
                    </div>
                </div>
            </div>

            <style>
                @keyframes slideDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
                @keyframes pulseGlow { 0% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.6); } 70% { box-shadow: 0 0 0 6px rgba(74, 222, 128, 0); } 100% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0); } }

                .fi-main {
                    background-color: #f1f5f9 !important;
                    background-image: radial-gradient(#cbd5e1 1px, transparent 1px) !important;
                    background-size: 24px 24px !important;
                }
                .dark .fi-main {
                    background-color: #0f172a !important;
                    background-image: radial-gradient(#1e293b 1px, transparent 1px) !important;
                }

                /* Menghaluskan Semua Kotak Widget Biasa (Statistik) */
                .fi-wi {
                    border-radius: 1.5rem !important;
                    border: 1px solid rgba(255, 255, 255, 0.9) !important;
                    background: rgba(255, 255, 255, 0.7) !important;
                    backdrop-filter: blur(16px) !important;
                    -webkit-backdrop-filter: blur(16px) !important;
                    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 10px 15px -3px rgba(0, 0, 0, 0.04) !important;
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
                    overflow: hidden !important;
                }
                .fi-wi:hover {
                    transform: translateY(-4px) !important;
                    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02) !important;
                    border-color: rgba(254, 202, 202, 0.8) !important; 
                }

                .fi-wi-stats-overview-stat { border-right: 1px solid rgba(226, 232, 240, 0.6) !important; padding: 1.5rem !important; }
                .fi-wi-stats-overview-stat:last-child { border-right: none !important; }
                .fi-wi-stats-overview-stat-value { font-size: 2.5rem !important; font-weight: 900 !important; background: linear-gradient(135deg, #cc1a1e, #ef4444); -webkit-background-clip: text; -webkit-text-fill-color: transparent; line-height: 1.2 !important; }
                .fi-wi-stats-overview-stat-label { font-weight: 700 !important; color: #475569 !important; font-size: 0.9rem !important; }
            </style>
        ');
    }
}