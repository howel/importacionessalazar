<div>
    <div class="bg-red-700 py-20 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-black uppercase mb-4">Maneja tu Honda hoy</h1>
            {{-- Ubicaciones corregidas --}}
            <p class="text-xl opacity-90 mb-8">Repuestos originales y los mejores modelos en Nueva Cajamarca y Moyobamba.</p>
            <a href="/tienda" class="bg-white text-red-700 px-10 py-3 rounded-full font-bold shadow-lg hover:bg-gray-100 transition">Ver Catálogo</a>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold mb-10 uppercase border-l-4 border-red-600 pl-4">Novedades</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($latestProducts as $product)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="h-48 bg-gray-200">
                        {{-- Mejora en la lógica de la imagen --}}
                        @if($product->image && isset($product->image[0]))
                            <img src="{{ asset('storage/' . $product->image[0]) }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">Sin foto</div>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg uppercase">{{ $product->name }}</h3>
                        <p class="text-2xl font-black text-red-600 my-2">S/ {{ number_format($product->price, 2) }}</p>
                        <a href="/tienda" class="block w-full text-center bg-gray-900 text-white py-2 rounded mt-2 hover:bg-black uppercase text-sm font-bold">Ver Detalles</a>
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500 italic">No hay productos registrados aún.</p>
            @endforelse
        </div>
    </div>
</div>
