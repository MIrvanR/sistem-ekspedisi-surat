<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use App\Filament\Auth\Pages\AdminLogin;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\HtmlString;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(AdminLogin::class)
            
            // ==========================================
            // 1. BRANDING (KPU Premium)
            // ==========================================
            ->brandName('E-DISPOS KPU')
            ->brandLogo(fn () => new HtmlString('
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg" alt="Logo KPU" style="height: 2.5rem; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));">
                    <span style="font-family: \'Plus Jakarta Sans\', sans-serif; font-size: 1.25rem; font-weight: 900; letter-spacing: -0.025em; color: #cc1a1e;">
                        E-DISPOS <span style="color: #0f172a;" class="dark:text-white">ADMIN</span>
                    </span>
                </div>
            '))
            ->brandLogoHeight('3rem')
            ->favicon('https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg')

            // ==========================================
            // 2. PALET WARNA VISUAL MODERN
            // ==========================================
            ->colors([
                'primary' => Color::hex('#cc1a1e'), // Merah KPU
                'gray' => Color::Slate, // Abu-abu elegan (tidak pucat)
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])

            // ==========================================
            // 3. TAMPILAN & LAYOUT ESTETIK (Fitur Visual Utama)
            // ==========================================
            ->font('Plus Jakarta Sans') // Font modern
            ->sidebarFullyCollapsibleOnDesktop() // Sidebar mengecil menjadi IKON saja saat dilipat
            ->maxContentWidth('screen-2xl') // Proporsi ruang tengah lebih rapi di layar besar
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->darkMode(true) // Tombol ganti tema Terang/Gelap
            
            // Fitur error databaseNotifications sudah dibuang jauh-jauh!
            
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                // INI YANG MEMANGGIL DASHBOARD BARUMU:
                \App\Filament\Pages\AdminDashboard::class, 
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // KOSONGKAN KOTAK INI UNTUK MEMBUANG WIDGET DEFAULT YANG JELEK
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}