<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría - Brioche</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                              url('{{ asset('wallpaper/wallpaper.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .form-container {
            backdrop-filter: blur(10px);
            background-color: rgba(22, 33, 62, 0.8);
        }
    </style>
</head>

<x-sidebar />

<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 form-container p-10 rounded-2xl shadow-2xl">
        <div>
            <h2 class="text-center text-4xl font-extrabold text-white tracking-wider">
                Editar Categoría
            </h2>
            <p class="mt-2 text-center text-sm text-gray-300">
                Actualiza los detalles de la categoría
            </p>
        </div>

        <!-- Formulario para editar categoría -->
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-200">Nombre de la Categoría</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        required
                        value="{{ old('nombre', $categoria->nombre) }}"
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-black bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent"
                    >
                    @error('nombre')
                        <div class="text-red-400 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div>
                <button
                    type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-accent hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent transition duration-300 ease-in-out transform hover:scale-105"
                >
                    Actualizar Categoría
                </button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('categorias.index') }}" class="text-sm text-gray-300 hover:text-white transition duration-300">
                Volver al listado de categorías
            </a>
        </div>
    </div>

    <script>
        // Mostrar alerta SweetAlert si hay un mensaje de éxito
        @if(session('success'))
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#00FF00'
            });
        @endif

        // Validación del formulario del lado del cliente
        document.querySelector('form').addEventListener('submit', function(e) {
            const nombre = document.getElementById('nombre');

            if (!nombre.value.trim()) {
                e.preventDefault();
                nombre.classList.add('border-red-500');
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, ingrese el nombre de la categoría',
                    icon: 'error',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#FF0000'
                });
                return;
            }
        });
    </script>
</body>
</html>