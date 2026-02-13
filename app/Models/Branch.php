<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Branch extends Model
{
    // Permitir asignación masiva de estos campos
    protected $fillable = ['name', 'address', 'phone', 'has_workshop'];

    /**
     * Relación con Productos (Muchos a Muchos)
     * Permite saber qué productos tiene esta sucursal y su stock.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('stock')
                    ->withTimestamps();
    }
}
