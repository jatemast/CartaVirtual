<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta de Bebidas </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper JS para el carrusel -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                              url('{{ asset('wallpaper/wallpaper.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #e6e6e6; /* Texto claro */
        }
        .bg-custom-dark {
            background-color: rgba(22, 33, 62, 0.8); /* Fondo oscuro con opacidad */
        }
        .text-accent {
            color: #e94560; /* Un tono de rojo para acentos */
        }
        .swiper-slide img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 15px;
        }
        .btn-pro {
            background: linear-gradient(90deg, #e94560, #f093fb);
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 1.125rem;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease-in-out;
        }
        .btn-pro:hover {
            background: linear-gradient(90deg, #f093fb, #e94560);
            transform: scale(1.05);
        }
    </style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('categoria').addEventListener('change', fetchProductos);
        document.getElementById('nombre').addEventListener('input', fetchProductos);
    });
</script>
</head>
<body class="bg-custom-dark">
    <!-- Header con diseño sofisticado -->
    <header class="bg-black bg-opacity-70 py-6 shadow-2xl">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="flex items-center">
                <img src="{{ asset('logo.jpeg') }}" alt="Logo" class="h-16 w-auto rounded-full mr-6 border-2 border-gold">
                <h1 class="text-3xl font-bold text-white tracking-wider">Licores cartagena</h1>
            </div>
            <nav>
                <ul class="flex space-x-6 text-white">
                    <li><a href="#" class="text-lg font-semibold hover:text-accent transition duration-300">Menú</a></li>
                    <li><a href="#" class="text-lg font-semibold hover:text-accent transition duration-300">Nosotros</a></li>
                    <li><a href="#" class="text-lg font-semibold hover:text-accent transition duration-300">Contacto</a></li>
                    <li><a href="{{ route('dashboard') }}" class="text-lg font-semibold hover:text-accent transition duration-300">Administrar carta de licores</a></li>
                    <li>
                        <a href="https://www.instagram.com" target="_blank" class="hover:opacity-75 transition">
                            <img src="{{ asset('redessociales/logoinstagram.webp') }}" alt="Instagram" class="h-6 w-6">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.whatsapp.com" target="_blank" class="hover:opacity-75 transition">
                            <img src="{{ asset('redessociales/whatsaap.webp') }}" alt="WhatsApp" class="h-6 w-6">
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenedor principal de productos -->
    <div class="container mx-auto p-6 bg-black bg-opacity-60 rounded-lg">
        <h2 class="text-4xl font-bold text-center text-white mb-10 tracking-wider">Nuestra Selección de Bebidas</h2>

        <!-- Filtros -->
        <div class="flex flex-wrap justify-center gap-6 mb-12">
            <div class="w-full sm:w-1/3 lg:w-1/4">
                <select id="categoria" class="block w-full p-4 bg-black bg-opacity-70 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
                    <option value="">Selecciona una Categoría(Todo)</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="w-full sm:w-1/3 lg:w-1/4">
                <input type="text" id="nombre" placeholder="Buscar por nombre" class="block w-full p-4 bg-black bg-opacity-70 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-accent">
            </div>
        </div>

        <!-- Lista de productos -->
        <div id="productos" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($productos as $producto)
                <div class="bg-black bg-opacity-70 rounded-lg overflow-hidden shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <img src="/storage/{{ $producto->foto }}" alt="{{ $producto->nombre }}" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-accent">{{ $producto->nombre }}</h3>
                        <p class="text-lg text-white mt-2">Precio: ${{ $producto->precio }}</p>
                        <p class="text-sm text-gray-400 mt-1">Categoría: {{ $producto->categoria->nombre }}</p>
                        <div class="flex flex-col space-y-2 mt-4">
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn-pro">Ver más</a>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn-pro">Editar</a>
                            <a href="{{ route('productos.destroy', $producto->id) }}" class="btn-pro">Eliminar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($productos->isEmpty())
            <div class="text-center text-gray-500 mt-12">
                No se encontraron productos registrados.
            </div>
        @endif
        <!-- Paginación -->
        <div class="mt-8">
            {{ $productos->links() }}
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black bg-opacity-70 py-6 mt-16">
        <div class="container mx-auto text-center text-white">
            <p>&copy; 2024 Licores cartagena. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        // Inicializar Swiper
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        // Filtrar productos automáticamente al cambiar la categoría
        function fetchProductos() {
            const categoriaId = document.getElementById('categoria').value;
            const nombre = document.getElementById('nombre').value;

            fetch('{{ route('productos.filter') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ categoria_id: categoriaId, nombre: nombre })
            })
            .then(response => response.json())
            .then(data => {
                const productosDiv = document.getElementById('productos');
                productosDiv.innerHTML = '';

                if (data.length === 0) {
                    productosDiv.innerHTML = '<div class="text-center text-gray-500 mt-6">No se encontraron productos.</div>';
                    return;
                }

                data.forEach(producto => {
                    productosDiv.innerHTML += `
                        <div class="bg-black bg-opacity-70 rounded-lg overflow-hidden shadow-2xl transform hover:scale-105 transition-all duration-300">
                            <img src="/storage/${producto.foto}" alt="${producto.nombre}" class="w-full h-56 object-cover">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-accent">${producto.nombre}</h3>
                                <p class="text-lg text-white mt-2">Precio: $${producto.precio}</p>
                                <p class="text-sm text-gray-400 mt-1">Categoría: ${producto.categoria.nombre}</p>
                                <div class="flex flex-col space-y-2 mt-4">
                                    <a href="/productos/${producto.id}" class="btn-pro">Ver más</a>
                                    <a href="/productos/${producto.id}/edit" class="btn-pro">Editar</a>
                                    <a href="/productos/${producto.id}/destroy" class="btn-pro">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    `;
                });
            })
            .catch(error => console.error(error));
        }

        // Función para buscar productos
        document.getElementById('buscar').addEventListener('click', fetchProductos);
    </script>
</body>
</html>
<!-- Paginación -->
<div class="mt-8">
    {{ $productos->links() }}
</div>
