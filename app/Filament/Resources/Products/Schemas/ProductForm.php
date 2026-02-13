<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre del Producto')
                    ->required()
                    ->live(onBlur: true)
                    // Generación automática del Slug al cambiar el nombre
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) =>
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                    ),

                TextInput::make('slug')
                    ->label('URL Amigable (Slug)')
                    ->required()
                    ->unique(table: 'products', ignoreRecord: true)
                    ->dehydrated(), // Asegura que se envíe a la base de datos aunque esté deshabilitado

                Select::make('type')
                    ->label('Categoría')
                    ->options([
                        'moto' => 'Moto',
                        'repuesto' => 'Repuesto',
                        'fuerza' => 'Fuerza',
                        'servicio' => 'Servicio'
                    ])
                    ->required()
                    ->live(),

                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),

                TextInput::make('price')
                    ->label('Precio')
                    ->required()
                    ->numeric()
                    ->prefix('$'),

                // Cilindraje: Solo para motos
                TextInput::make('cc')
                    ->label('Cilindraje (CC)')
                    ->numeric()
                    ->visible(fn ($get) => $get('type') === 'moto')
                    ->required(fn ($get) => $get('type') === 'moto'),

                // SKU: Ahora visible tanto para Motos como para Repuestos
                TextInput::make('sku')
                    ->label('SKU / Parte')
                    ->visible(fn ($get) => in_array($get('type'), ['moto', 'repuesto'])),

                FileUpload::make('image')
                    ->label('Galería de Imágenes')
                    ->image()
                    ->multiple() // Permite seleccionar varias fotos a la vez
                    ->reorderable() // Permite arrastrar para ordenar cuál es la principal
                    ->appendFiles() // Permite subir más fotos después sin borrar las anteriores
                    ->directory('products')
                    ->columnSpanFull(), // Le da más espacio visual para ver las miniaturas

                Toggle::make('is_active')
                    ->label('¿Activo?')
                    ->default(true)
                    ->required(),
            ]);
    }
}
