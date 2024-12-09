<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        .product-card {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo ligeramente blanco */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            width: 80%;
        }
        .product-img {
            max-width: 100%;
            border-radius: 8px;
        }
        .btn {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<x-sidebar />

<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 form-container p-10 rounded-2xl shadow-2xl">

        <div>
            <h2 class="text-center text-4xl font-extrabold text-white tracking-wider">
                Detalles del Producto
            </h2>
        </div>

        <div class="product-card">
            <!-- Imagen del producto -->
            <img src="{{ asset('storage/' . $producto->foto) }}" alt="{{ $producto->nombre }}" class="product-img mb-4">

            <h3 class="text-xl font-bold text-gray-800">{{ $producto->nombre }}</h3>
            <p class="text-lg text-gray-600 mt-2">Precio: ${{ number_format($producto->precio, 2) }}</p>

            <!-- Información de la categoría -->
            <p class="text-sm text-gray-500 mt-2">Categoría: {{ $producto->categoria->nombre }}</p>

            <!-- Botón para regresar -->
            <div class="text-center mt-6">
                <a href="{{ route('productos.index') }}" class="btn">Volver a la lista de productos</a>
            </div>
        </div>

    </div>

    <script>
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
