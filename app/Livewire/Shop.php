<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination; // Para que no cargue 100 motos de golpe

class Shop extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.shop', [
            'products' => Product::where('is_active', true)
                                ->latest()
                                ->paginate(12)
        ]);
    }
}
