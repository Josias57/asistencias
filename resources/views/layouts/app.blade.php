<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Asistencias')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navegación -->
    <nav class="bg-blue-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-white text-2xl font-bold">📚 AsistApp</a>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('estudiantes.index') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded transition">
                        👥 Estudiantes
                    </a>
                    <a href="{{ route('asistencias.index') }}" class="text-white hover:bg-blue-700 px-4 py-2 rounded transition">
                        ✓ Asistencias
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-12">
        <p>&copy; 2025 Sistema de Asistencias - Todos los derechos reservados</p>
    </footer>
</body>
</html>