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

                <form method="POST" action="{{ route('register') }}" class="p-8 space-y-6">
                    @csrf

                    <x-validation-errors class="mb-4" />

                    <div>
                        <x-label for="name" value="{{ __('Nombre') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="name" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-label for="email" value="{{ __('Correo Electrónico') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="usuario@ejemplo.com" />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Contraseña') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                    </div>

                    <div>
                        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" class="block text-sm font-medium text-gray-700 mb-2" />
                        <x-input id="password_confirmation" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />
                                    <div class="ms-2">
                                        {!! __('Estoy de acuerdo con los :terms_of_service y :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Términos de servicio').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Política de privacidad').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-between mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('¿Ya tienes una cuenta?') }}
                        </a>

                        <x-button class="ms-4 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('Registrarse') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
