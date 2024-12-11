<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Roles</title>
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
    <h1 class="text-4xl font-bold mb-8 text-center">Gestión de Roles</h1>

    <!-- Mensajes de éxito y error -->
    @if(session('success'))
        <p class="text-green-500 mb-4">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p class="text-red-500 mb-4">{{ session('error') }}</p>
    @endif

    <!-- Filtro para buscar usuarios -->
    <form method="GET" action="{{ route('roles.index') }}" class="mb-6">
        <input type="text" name="search" placeholder="Buscar por nombre"
               class="px-4 py-2 bg-gray-700 text-white rounded"
               value="{{ request('search') }}" />
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
            Buscar
        </button>
    </form>

    <!-- Listado de roles -->
    <div class="table-container max-w-4xl w-full">
        <h2 class="text-2xl font-semibold mb-4">Listado de Usuarios y Roles</h2>
        @if($users->isEmpty())
            <p class="text-gray-300">No hay usuarios registrados.</p>
        @else
        <table class="table-auto w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-700">
                    <th class="px-4 py-2 text-gray-300">Nombre</th>
                    <th class="px-4 py-2 text-gray-300">Email</th>
                    <th class="px-4 py-2 text-gray-300">Roles</th>
                    <th class="px-4 py-2 text-gray-300 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">
                            @if($user->roles->isEmpty())
                                Cliente
                            @else
                                @foreach($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center space-x-2">
                            @if($user->roles->isEmpty())
                                <form method="POST" action="{{ route('roles.assign', $user->id) }}" class="inline-block"
                                      onsubmit="return confirm('¿Estás seguro de convertir a este usuario en administrador?');">
                                    @csrf
                                    <input type="hidden" name="role" value="admin">
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                                        Asignar rol admin
                                    </button>
                                </form>
                            @else
                                @if($user->hasRole('admin'))
                                    @if($user->id !== auth()->id())
                                        <form method="POST" action="{{ route('roles.remove', $user->id) }}" class="inline-block"
                                              onsubmit="return confirm('¿Estás seguro de revocar privilegios de administrador a este usuario?');">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="role" value="admin">
                                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                                Quitar rol admin
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <form method="POST" action="{{ route('roles.assign', $user->id) }}" class="inline-block"
                                          onsubmit="return confirm('¿Estás seguro de convertir a este usuario en administrador?');">
                                        @csrf
                                        <input type="hidden" name="role" value="admin">
                                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                                            Asignar rol admin
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>
