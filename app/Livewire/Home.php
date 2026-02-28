<?php

namespace App\Livewire;

use App\Models\Product; // IMPORTANTE: No olvides esta línea
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            // Traemos las motos activas para que el @foreach tenga qué mostrar
            'latestProducts' => Product::where('is_active', true)
                                      ->latest()
                                      ->take(4)
                                      ->get()
        ]);
    }
}
