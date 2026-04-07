<?php

namespace App\Filament\Auth\Pages;

use Filament\Auth\Pages\Login as FilamentLogin;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class UserLogin extends FilamentLogin
{
    protected static ?string $title = 'E-DISPOS KPU Provinsi Bengkulu';

    // 1. HEADER (LOGO PURE & GLOW, JUDUL)
    public function getHeading(): string | Htmlable | null
    {
        if (filled($this->userUndertakingMultiFactorAuthentication)) {
            return 'Tantangan Multi-faktor';
        }

        return new HtmlString('
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1.5rem; margin-top: 0.5rem; animation: fadeDown 0.8s ease-out;">
                
                <div style="position: relative; display: flex; justify-content: center; align-items: center; padding: 1rem;">
                    <div style="position: absolute; width: 120px; height: 120px; background-color: rgba(220, 38, 38, 0.25); border-radius: 50%; filter: blur(20px); animation: pulseGlow 4s ease-in-out infinite;"></div>
                    
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg" alt="Logo KPU" style="width: 90px; height: auto; position: relative; z-index: 10; filter: drop-shadow(0 15px 20px rgba(0, 0, 0, 0.25)); transform: translateZ(0);">
                </div>
                
                <div style="text-align: center;">
                    <h2 style="font-size: 1.85rem; font-weight: 900; letter-spacing: -0.03em; color: #0f172a; margin: 0; line-height: 1.2;">
                        LOGIN <span style="background: linear-gradient(to right, #e11d48, #991316); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">USER</span>
                    </h2>
                    <p style="font-size: 0.68rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.28em; color: #64748b; margin-top: 0.6rem;">
                        E-DISPOS KPU PROVINSI BENGKULU
                    </p>
                </div>
            </div>
        ');
    }

    // 2. CSS INJECTION LEVEL DEWA (SAMA DENGAN ADMIN)
    public function getSubheading(): string | Htmlable | null
    {
        return new HtmlString('
            <div style="text-align: center; margin-bottom: 2rem; animation: fadeUp 0.8s ease-out 0.2s both;">
                <p style="font-size: 0.9rem; color: #64748b; font-weight: 600;">Otorisasi Akses Bagian / Divisi Internal</p>
            </div>
            
            <div style="display: flex; justify-content: center; margin-bottom: 2.5rem; position: relative; z-index: 20; animation: fadeUp 0.8s ease-out 0.3s both;">
                <a href="/" style="display: inline-flex; align-items: center; gap: 0.6rem; padding: 0.7rem 1.5rem; background: rgba(255, 255, 255, 0.95); color: #334155; font-size: 0.8rem; font-weight: 700; border-radius: 9999px; text-decoration: none; border: 1px solid rgba(226, 232, 240, 0.8); box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.07); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); backdrop-filter: blur(10px);" onmouseover="this.style.backgroundColor=\'#fef2f2\'; this.style.color=\'#dc2626\'; this.style.borderColor=\'#fecaca\'; this.style.transform=\'translateY(-2px)\'; this.style.boxShadow=\'0 12px 20px -3px rgba(220, 38, 38, 0.12)\';" onmouseout="this.style.backgroundColor=\'rgba(255, 255, 255, 0.95)\'; this.style.color=\'#334155\'; this.style.borderColor=\'rgba(226, 232, 240, 0.8)\'; this.style.transform=\'translateY(0)\'; this.style.boxShadow=\'0 4px 6px -1px rgba(0, 0, 0, 0.07)\';">
                    <svg style="width: 18px; height: 18px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda Utama
                </a>
            </div>

            <style>
                /* Sembunyikan Logo Bawaan Filament */
                .fi-logo { display: none !important; }

                /* 1. BACKGROUND GLOBAL BODY */
                body {
                    background-color: #f8fafc !important;
                    background-image: 
                        /* Grid Pola */
                        linear-gradient(to right, rgba(15, 23, 42, 0.04) 1px, transparent 1px),
                        linear-gradient(to bottom, rgba(15, 23, 42, 0.04) 1px, transparent 1px),
                        /* Glow Merah Kiri Atas */
                        radial-gradient(circle at 10% 10%, rgba(220, 38, 38, 0.18) 0%, transparent 45%),
                        /* Glow Merah Kanan Bawah */
                        radial-gradient(circle at 90% 90%, rgba(220, 38, 38, 0.18) 0%, transparent 45%) !important;
                    background-size: 45px 45px, 45px 45px, 100% 100%, 100% 100% !important;
                    background-attachment: fixed !important;
                    position: relative;
                    z-index: 1;
                }
                
                /* Dark Mode Body Background */
                .dark body {
                    background-color: #020617 !important;
                    background-image: 
                        linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                        linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                        radial-gradient(circle at 10% 10%, rgba(220, 38, 38, 0.22) 0%, transparent 45%),
                        radial-gradient(circle at 90% 90%, rgba(220, 38, 38, 0.22) 0%, transparent 45%) !important;
                }

                /* 2. SILUET GEDUNG BAWAH */
                body::after {
                    content: "";
                    position: fixed;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 38vh;
                    background-image: url("data:image/svg+xml,%3Csvg viewBox=%220 0 1440 320%22 fill=%22%2394a3b8%22 xmlns=%22http://www.w3.org/2000/svg%22 preserveAspectRatio=%22xMidYMax slice%22%3E%3Crect x=%22100%22 y=%22200%22 width=%22250%22 height=%22120%22 opacity=%220.5%22/%3E%3Crect x=%221090%22 y=%22180%22 width=%22250%22 height=%22140%22 opacity=%220.5%22/%3E%3Crect x=%22450%22 y=%22120%22 width=%22540%22 height=%22200%22 opacity=%220.7%22/%3E%3Cpolygon points=%22720,20 420,120 1020,120%22 opacity=%220.8%22/%3E%3Crect x=%22480%22 y=%22120%22 width=%2240%22 height=%22200%22 fill=%22%2364748b%22/%3E%3Crect x=%22560%22 y=%22120%22 width=%2240%22 height=%22200%22 fill=%22%2364748b%22/%3E%3Crect x=%22640%22 y=%22120%22 width=%2240%22 height=%22200%22 fill=%22%2364748b%22/%3E%3Crect x=%22760%22 y=%22120%22 width=%2240%22 height=%22200%22 fill=%22%2364748b%22/%3E%3Crect x=%22840%22 y=%22120%22 width=%2240%22 height=%22200%22 fill=%22%2364748b%22/%3E%3Crect x=%22920%22 y=%22120%22 width=%2240%22 height=%22200%22 fill=%22%2364748b%22/%3E%3Cpath d=%22M680,240 h80 v80 h-80 z%22 fill=%22%23475569%22/%3E%3Cpath d=%22M680,240 a40,40 0 0,1 80,0%22 fill=%22%23475569%22/%3E%3C/svg%3E");
                    background-repeat: no-repeat;
                    background-position: bottom center;
                    background-size: cover;
                    opacity: 0.28;
                    z-index: -1;
                    pointer-events: none;
                }
                .dark body::after { opacity: 0.18; fill: #334155; }

                /* 3. PARTIKEL MELAYANG */
                body::before {
                    content: "";
                    position: fixed;
                    top: 0; left: 0; width: 100%; height: 100%;
                    background-image: radial-gradient(rgba(220, 38, 38, 0.35) 2.5px, transparent 2.5px), radial-gradient(rgba(220, 38, 38, 0.2) 1.5px, transparent 1.5px);
                    background-size: 110px 110px, 70px 70px;
                    background-position: 0 0, 35px 35px;
                    z-index: -1;
                    animation: particleFloat 35s linear infinite;
                    opacity: 0.55;
                    pointer-events: none;
                }

                /* 4. KOTAK LOGIN GLASSMORPHISM (ULTRA-ROUNDED) */
                .fi-simple-main-content {
                    background: rgba(255, 255, 255, 0.78) !important;
                    backdrop-filter: blur(26px) saturate(160%) !important;
                    -webkit-backdrop-filter: blur(26px) saturate(160%) !important;
                    border: 1px solid rgba(255, 255, 255, 1) !important;
                    box-shadow: 
                        0 4px 6px -1px rgba(0, 0, 0, 0.06), 
                        0 30px 60px -15px rgba(220, 38, 38, 0.18),
                        inset 0 0 0 1px rgba(255, 255, 255, 0.5) !important;
                    border-radius: 4rem !important; 
                    padding: 3.5rem !important;
                    position: relative;
                    z-index: 10;
                    animation: cardEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) both;
                }
                .dark .fi-simple-main-content {
                    background: rgba(15, 23, 42, 0.75) !important;
                    border: 1px solid rgba(255, 255, 255, 0.08) !important;
                    box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.55) !important;
                }

                /* 5. INPUT KOLOM PREMIUM (SILVER/ABU-ABU) */
                .fi-input-wrapper {
                    border: none !important; 
                    border-radius: 1.25rem !important;
                    box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.07) !important;
                    background-color: #f1f5f9 !important; 
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
                    overflow: hidden !important; 
                }
                .fi-input-wrapper:focus-within {
                    box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.03), 0 0 0 2.5px rgba(204, 26, 30, 0.85) !important; 
                    background-color: #ffffff !important;
                }
                
                .dark .fi-input-wrapper {
                    background-color: #1e293b !important;
                    box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.25) !important;
                }
                .dark .fi-input-wrapper:focus-within {
                    background-color: #0f172a !important;
                }
                
                .fi-input {
                    border: none !important;
                    box-shadow: none !important;
                    background: transparent !important;
                    padding: 0.85rem 1.25rem !important;
                    font-size: 0.95rem !important;
                }

                input:-webkit-autofill,
                input:-webkit-autofill:hover, 
                input:-webkit-autofill:focus, 
                input:-webkit-autofill:active{
                    -webkit-box-shadow: 0 0 0 30px #f1f5f9 inset !important;
                    transition: background-color 5000s ease-in-out 0s;
                }
                .fi-input-wrapper:focus-within input:-webkit-autofill {
                    -webkit-box-shadow: 0 0 0 30px #ffffff inset !important;
                }

                /* 6. TOMBOL LOGIN DENGAN ANIMASI "SHINE" */
                .fi-btn[type="submit"] {
                    background: linear-gradient(135deg, #e11d48 0%, #991316 100%) !important;
                    border: none !important;
                    box-shadow: 0 12px 28px -6px rgba(220, 38, 38, 0.45), inset 0 1px 0 rgba(255, 255, 255, 0.25) !important;
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
                    font-weight: 800 !important;
                    letter-spacing: 0.06em !important;
                    border-radius: 1.5rem !important;
                    color: white !important;
                    text-transform: uppercase;
                    padding: 1rem 2.5rem !important;
                    position: relative;
                    overflow: hidden;
                    margin-top: 1.5rem !important;
                    font-size: 0.95rem !important;
                }
                .fi-btn[type="submit"]::after {
                    content: "";
                    position: absolute;
                    top: 0; left: -100%; width: 50%; height: 100%;
                    background: linear-gradient(to right, transparent, rgba(255,255,255,0.3), transparent);
                    transform: skewX(-20deg);
                    animation: shine 4.5s infinite;
                }
                .fi-btn[type="submit"]:hover {
                    transform: translateY(-3.5px) scale(1.025) !important;
                    box-shadow: 0 22px 40px -6px rgba(220, 38, 38, 0.55), inset 0 1px 0 rgba(255, 255, 255, 0.3) !important;
                }

                /* KEYFRAMES ANIMASI KUSTOM */
                @keyframes pulseGlow { 0%, 100% { opacity: 0.8; filter: blur(20px); } 50% { opacity: 1; filter: blur(28px); } }
                @keyframes fadeDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
                @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
                @keyframes cardEntrance { from { opacity: 0; transform: translateY(40px) scale(0.94); } to { opacity: 1; transform: translateY(0) scale(1); } }
                @keyframes particleFloat { 0% { background-position: 0 0, 35px 35px; } 100% { background-position: 110px -110px, 145px -75px; } }
                @keyframes shine { 0% { left: -100%; } 20% { left: 200%; } 100% { left: 200%; } }
            </style>
        ');
    }
}