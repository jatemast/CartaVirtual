<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Actualizar Producto</h1>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-bold">Nombre</label>
                <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    value="{{ old('nombre', $producto->nombre) }}"
                    class="w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('nombre')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="precio" class="block text-gray-700 font-bold">Precio</label>
                <input
                    type="number"
                    step="0.01"
                    name="precio"
                    id="precio"
                    value="{{ old('precio', $producto->precio) }}"
                    class="w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                @error('precio')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-gray-700 font-bold">Foto</label>
                <input
                    type="file"
                    name="foto"
                    id="foto"
                    class="w-full p-3 rounded-md border border-gray-300 focus:outline-none"
                >
                @if($producto->foto)
                    <img src="{{ asset('storage/' . $producto->foto) }}" alt="Foto del producto" class="w-32 mt-3">
                @endif
                @error('foto')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="categoria_id" class="block text-gray-700 font-bold">Categoría</label>
                <select
                    name="categoria_id"
                    id="categoria_id"
                    class="w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
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

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                Actualizar Producto
            </button>
        </form>
    </div>
</body>
</html>
