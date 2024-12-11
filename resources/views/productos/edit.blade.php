<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto - Brioche</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
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
    <div class="max-w-md w-full form-container p-10 rounded-2xl shadow-2xl">
        <div>
            <h2 class="text-center text-4xl font-extrabold text-white tracking-wider">
                Actualizar Producto
            </h2>
            <p class="mt-2 text-center text-sm text-gray-300">
                Edita los detalles de tu producto
            </p>
        </div>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-200">Nombre del Producto</label>
                <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $producto->nombre) }}" required
                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-black bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nombre')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="precio" class="block text-sm font-medium text-gray-200">Precio</label>
                <input id="precio" name="precio" type="number" step="0.01" value="{{ old('precio', $producto->precio) }}" required
                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-black bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('precio')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="categoria_id" class="block text-sm font-medium text-gray-200">Categoría</label>
                <select id="categoria_id" name="categoria_id" required
                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-black bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == old('categoria_id', $producto->categoria_id) ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-200">Foto del Producto</label>
                <div class="flex items-center space-x-4">
                    <input id="foto" name="foto" type="file" accept="image/*" class="hidden">
                    <label for="foto" class="cursor-pointer flex items-center space-x-2 text-sm text-gray-300">
                        <i class="fas fa-camera text-blue-500"></i>
                        <span>Seleccionar archivo</span>
                    </label>
                    @if($producto->foto)
                        <img src="{{ asset('storage/' . $producto->foto) }}" alt="Foto del producto" class="w-20 h-20 rounded-md">
                    @endif
                </div>
                @error('foto')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <textarea id="descripcion" name="descripcion" rows="3"
            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-700 bg-black bg-opacity-50 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{ old('descripcion', $producto->descripcion) }}
        </textarea>
            <button type="submit"
                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:scale-105">
                Actualizar Producto
            </button>
        </form>


        <div class="text-center">
            <a href="{{ route('productos.index') }}" class="text-sm text-gray-300 hover:text-white transition duration-300">
            Volver al listado de productos
            </a>
        </div>
    </div>
</body>
</html>
