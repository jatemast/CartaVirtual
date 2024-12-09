<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
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
        .product-img-preview {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<x-sidebar />

<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 form-container p-10 rounded-2xl shadow-2xl">
        <div>
            <h2 class="text-center text-4xl font-extrabold text-white tracking-wider">
                Crear Nuevo Producto
            </h2>
            <p class="mt-2 text-center text-sm text-gray-300">
                Ingresa los detalles del nuevo producto
            </p>
        </div>

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-200">Nombre del Producto</label>
                    <input id="nombre" name="nombre" type="text" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-black bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-sm font-medium text-gray-200">Precio</label>
                    <input id="precio" name="precio" type="number" step="0.01" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-black bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                </div>

                <div class="mb-4">
                    <label for="categoria_id" class="block text-sm font-medium text-gray-200">Categoría</label>
                    <select id="categoria_id" name="categoria_id" required
                        class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-black bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent">
                        <option value="">Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" class="bg-gray-900">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-200">Foto del Producto</label>
                    <div class="flex items-center">
                        <input id="foto" name="foto" type="file" accept="image/*" onchange="previewImage(event)" class="hidden">
                        <label for="foto" class="cursor-pointer flex items-center space-x-2 text-sm text-gray-300">
                            <i class="fas fa-camera text-accent"></i>
                            <span>Seleccionar archivo</span>
                        </label>
                    </div>
                    <img id="foto-preview" class="product-img-preview" alt="Previsualización de la imagen">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-accent hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent transition duration-300 ease-in-out transform hover:scale-105">
                    Guardar Producto
                </button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('productos.index') }}" class="text-sm text-gray-300 hover:text-white transition duration-300">
                Volver al listado de productos
            </a>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('foto-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Mostrar la previsualización
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none'; // Ocultar si no se seleccionó imagen
            }
        }

        @if(session('success'))
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        @endif
    </script>
</body>
</html>
