<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Actions\BulkActionGroup;

class LatestProducts extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2; // Lo mantiene debajo de las estadísticas

    protected static ?string $heading = 'Últimas Motos Registradas';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->circular()
                    ->stacked()
                    ->limit(1),

                Tables\Columns\TextColumn::make('name')
                    ->label('Modelo')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Precio')
                    ->money('S/ ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('cc')
                    ->label('CC')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y')
                    ->color('gray'),
            ])
            // AQUÍ VA EL ENLACE:
            ->recordUrl(
                fn (Product $record): string => "/admin/products/{$record->id}/edit"
            )
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
