<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\Artikel;
use App\Filament\Widgets\CreatorAppWidget;
use App\Filament\Widgets\StatistikInvestasiOverview;
use Filament\Pages;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Panel;
use App\Models\User;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Filament\Resources\UserResource;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Filament\Navigation\NavigationItem;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel

            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            //customize 
            ->colors([
                'danger' => '#ad2f2f',      // rgb(173, 47, 47)
                'gray' => '#4e535c',        // rgb(78, 83, 92)
                'info' => '#007bff',        // rgb(0, 123, 255)
                'primary' => '#156d5a',     // rgb(21, 109, 90)
                'success' => '#3a9932',     // rgb(58, 153, 50)
                'warning' => '#ffc107',     // rgb(255, 193, 7)
            ])

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->resources([
                UserResource::class,
            ])
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                CreatorAppWidget::class,
                StatistikInvestasiOverview::class,
                Artikel::class,
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
            ->plugins([
                FilamentShieldPlugin::make(),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
