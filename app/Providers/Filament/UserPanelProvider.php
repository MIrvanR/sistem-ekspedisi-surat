<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\HtmlString;

class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('user')
            ->path('user')
            ->login(\App\Filament\Auth\Pages\UserLogin::class)
            
            ->brandName('E-DISPOS KPU')
            ->brandLogo(fn () => new HtmlString('
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg" alt="Logo KPU" style="height: 2.5rem; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));">
                    <span style="font-family: Inter, sans-serif; font-size: 1.25rem; font-weight: 900; letter-spacing: -0.025em; color: #cc1a1e;">
                        E-DISPOS <span style="color: #0f172a;" class="dark:text-white">KPU</span>
                    </span>
                </div>
            '))
            ->brandLogoHeight('3rem')
            ->favicon('https://upload.wikimedia.org/wikipedia/commons/4/46/KPU_Logo.svg')
            ->colors([
                'primary' => Color::hex('#cc1a1e'),
            ])
            ->font('Inter')
            
            // Layout tetap lebar full screen
            ->maxContentWidth('full') 
            ->sidebarCollapsibleOnDesktop()

            ->discoverResources(in: app_path('Filament/UserResources'), for: 'App\\Filament\\UserResources')
            ->discoverPages(in: app_path('Filament/UserPages'), for: 'App\\Filament\\UserPages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/UserWidgets'), for: 'App\\Filament\\UserWidgets')
            
            ->widgets([]) 
            
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
            
            // TIDAK ADA LAGI CSS INJECTIONS DI SINI
    }
}