<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistencias</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-purple-600">Lista de Asistencias</h1>
                <a href="{{ url('/') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Volver al inicio
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-purple-500 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Estudiante</th>
                            <th class="px-6 py-3 text-left">Fecha</th>
                            <th class="px-6 py-3 text-left">Estado</th>
                            <th class="px-6 py-3 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($asistencias ?? [] as $asistencia)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $asistencia->id }}</td>
                                <td class="px-6 py-4">{{ $asistencia->estudiante->nombre ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $asistencia->fecha }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-sm
                                        @if($asistencia->estado == 'presente') bg-green-200 text-green-800
                                        @elseif($asistencia->estado == 'ausente') bg-red-200 text-red-800
                                        @else bg-yellow-200 text-yellow-800
                                        @endif">
                                        {{ ucfirst($asistencia->estado) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-blue-600 hover:text-blue-800 mr-2">Ver</button>
                                    <button class="text-green-600 hover:text-green-800 mr-2">Editar</button>
                                    <button class="text-red-600 hover:text-red-800">Eliminar</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    No hay asistencias registradas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>