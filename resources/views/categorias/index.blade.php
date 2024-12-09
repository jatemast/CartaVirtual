<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                              url('{{ asset('wallpaper/wallpaper.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
        }
        .table-container {
            backdrop-filter: blur(10px);
            background-color: rgba(22, 33, 62, 0.8);
            border-radius: 0.5rem;
            padding: 2rem;
        }
    </style>
</head>
<x-sidebar />
<body class="min-h-screen flex flex-col items-center py-12">
    <h1 class="text-4xl font-bold mb-8 text-center">Gestión de Categorías</h1>

    <!-- Botón para crear nueva categoría -->
    <div class="mb-6">
        <a href="{{ route('categorias.create') }}"
           class="px-6 py-2 bg-blue-500 text-white rounded shadow hover:bg-blue-600 transition">
            Crear Nueva Categoría
        </a>
    </div>

    <!-- Listado de categorías -->
    <div class="table-container max-w-4xl w-full">
        <h2 class="text-2xl font-semibold mb-4">Listado de Categorías</h2>
        @if($categorias->isEmpty())
            <p class="text-gray-300">No hay categorías registradas.</p>
        @else
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="px-4 py-2 text-gray-300">Nombre</th>
                        <th class="px-4 py-2 text-gray-300">Productos</th>
                        <th class="px-4 py-2 text-gray-300 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr class="border-t border-gray-600">
                            <td class="px-4 py-2">{{ $categoria->nombre }}</td>
                            <td class="px-4 py-2">
                                @if($categoria->productos->isEmpty())
                                    <span class="text-gray-400">Sin productos</span>
                                @else
                                    <ul class="list-disc list-inside">
                                        @foreach($categoria->productos as $producto)
                                            <li>{{ $producto->nombre }} 
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <!-- Botón Editar -->
                                <a href="{{ route('categorias.edit', $categoria->id) }}"
                                   class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                                    Editar
                                </a>
                                <!-- Botón Eliminar -->
                                <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

</html>
