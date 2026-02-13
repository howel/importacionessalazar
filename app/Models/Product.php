<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'price',
        'cc',
        'sku',
        'image',
        'is_active'
    ];

    /**
     * Casts para asegurar que los datos se traten correctamente.
     */
    protected $casts = [
        'image' => 'array',      // Indispensable para la galería múltiple
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * PHP 8.4 PROPERTY HOOK
     * Devuelve el precio formateado automáticamente.
     */
    public string $formattedPrice {
        get => '$' . number_format($this->price, 2);
    }

    /**
     * Relación con Sucursales (Manejo de Stock)
     */
    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class)
                    ->withPivot('stock')
                    ->withTimestamps();
    }

    /**
     * Lógica de inicialización
     */
    protected static function booted()
    {
        static::creating(function ($product) {
            // Solo genera el slug si no viene uno ya definido por el formulario
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            // Actualiza el slug si el nombre cambió (Opcional, pero recomendado)
            if ($product->isDirty('name') && ! $product->isDirty('slug')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
