<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-black mb-8 uppercase">Nuestro Inventario</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
            <div class="bg-white rounded-xl shadow hover:shadow-xl transition p-4 border border-gray-100">
                <div class="h-48 mb-4">
                    @if($product->image && isset($product->image[0]))
                        <img src="{{ asset('storage/' . $product->image[0]) }}" class="w-full h-full object-contain">
                    @else
                        <div class="flex items-center justify-center h-full bg-gray-100 text-gray-400">Sin imagen</div>
                    @endif
                </div>
                {{-- Badge de tipo --}}
                <span class="bg-red-100 text-red-600 font-bold text-[10px] px-2 py-1 rounded-full uppercase">{{ $product->type }}</span>
                <h3 class="font-bold text-lg mb-2 uppercase mt-2">{{ $product->name }}</h3>
                <p class="text-xl font-black text-gray-800">S/ {{ number_format($product->price, 2) }}</p>
                <button class="w-full bg-red-600 text-white mt-4 py-2 rounded font-bold uppercase text-sm hover:bg-red-700 transition">Consultar</button>
            </div>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $products->links() }}
    </div>
</div>
