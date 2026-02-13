<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Nombre'),

                TextEntry::make('slug')
                    ->label('URL Amigable'),

                TextEntry::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'moto' => 'danger',
                        'repuesto' => 'warning',
                        'fuerza' => 'success',
                        'servicio' => 'info',
                        default => 'gray',
                    }),

                TextEntry::make('description')
                    ->label('Descripción')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('price')
                    ->label('Precio')
                    ->money('USD'),

                TextEntry::make('cc')
                    ->label('Cilindraje')
                    ->suffix(' cc')
                    ->placeholder('-'), // Se eliminó el punto y coma extra aquí

                TextEntry::make('sku')
                    ->label('SKU')
                    ->placeholder('-'),

                ImageEntry::make('image')
                    ->label('Galería de Imágenes')
                    ->stacked() // Muestra las imágenes una sobre otra ligeramente
                    ->limit(5)  // Muestra hasta 5 miniaturas si hay muchas
                    ->circular()
                    ->placeholder('Sin imágenes'),

                IconEntry::make('is_active')
                    ->label('Estado')
                    ->boolean(),

                TextEntry::make('created_at')
                    ->label('Fecha de Registro')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('Última Actualización')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
