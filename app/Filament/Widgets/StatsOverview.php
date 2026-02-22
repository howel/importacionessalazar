<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Branch;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // CORRECCIÓN: Quitamos el "static"
    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total de Motos', Product::count())
                ->description('Modelos registrados')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('success'),

            Stat::make('Sucursales', Branch::count())
                ->description('Puntos de venta')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('primary'),

            Stat::make('Catálogo Activo', Product::where('is_active', true)->count())
                ->description('Motos visibles al público')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('warning'),
        ];
    }
}
