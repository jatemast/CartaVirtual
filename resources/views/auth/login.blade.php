<x-guest-layout>
    <div class="min-h-screen py-12 flex items-center justify-center"
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('wallpaper/wallpaper.jpg') }}');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;">
        <div class="w-full max-w-md">
            <div class="bg-white bg-opacity-90 shadow-2xl rounded-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6 text-center">
                    <h2 class="text-3xl font-bold text-white tracking-wider">
                        Gestión de Carta de Licores
                    </h2>
                </div>

                <form method="POST" action="{{ route('login') }}" class="p-8 space-y-6">
                    @csrf

                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <x-label for="email" value="{{ __('Correo Electrónico') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                        <x-input
                            id="email"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="usuario@ejemplo.com"
                        />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Contraseña') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                        <x-input
                            id="password"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <label for="remember_me" class="ms-2 text-sm text-gray-600">
                                {{ __('Recordarme') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-blue-600 hover:text-blue-500 hover:underline">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>

                    <div>
                        <x-button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('Iniciar Sesión') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
