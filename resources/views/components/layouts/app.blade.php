<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importaciones Salazar | Honda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900">
    <nav class="bg-black text-white p-4 sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="flex items-center gap-2">
                <span class="text-xl font-extrabold tracking-tighter text-white">
                    IMPORTACIONES <span class="text-red-600">SALAZAR</span>
                </span>
            </a>
            <div class="hidden md:flex space-x-8 font-semibold uppercase text-sm tracking-widest">
                <a href="/" class="hover:text-red-500 transition">Inicio</a>
                <a href="/tienda" class="hover:text-red-500 transition">Tienda</a>
                <a href="/admin" class="bg-red-600 px-4 py-2 rounded-md hover:bg-red-700 transition">Panel Admin</a>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800">
        <div class="container mx-auto text-center">
            <p class="text-white font-bold mb-2 uppercase tracking-widest">Importaciones Salazar</p>
            <p class="text-sm">Distribuidor Autorizado Honda - Nueva Cajamarca y Moyobamba</p>
            <p class="mt-6 text-xs">&copy; 2026 Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>