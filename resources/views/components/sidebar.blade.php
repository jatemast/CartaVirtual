
    <div id="sidebar-container" class="fixed inset-0 pointer-events-none z-[9999]">
        <div id="sidebar-overlay" class="absolute inset-0 hidden bg-black opacity-50 pointer-events-auto"></div>

        <aside id="default-sidebar"
            class="fixed top-0 left-0 w-16 h-screen transition-all duration-300 ease-in-out pointer-events-auto sm:translate-x-0"
            aria-label="Sidebar">
            <div class="flex flex-col h-full px-3 py-4 bg-gradient-to-br from-[#0F293E]">
                <div class="mb-4 ml-16">
                    <img id="sidebar-logo" src="{{ asset('logo.jpeg') }}"
                        alt="Camg" class="h-16 w-auto rounded-full border-2 border-gold transition-all duration-300">
                </div>     <ul id="sidebar-menu" class="flex-grow space-y-2 font-medium">
                    <li>
                        <a href="{{ route('productos.index') }}" onclick="dashboard()"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                                </svg>
                            </div>
                            <span class="flex-1 transition-opacity duration-300 ease-in-out transform opacity-0 ms-3 whitespace-nowrap">Catálogo</span>       </a>
                    </li>
                    <li>
                        <a href="{{ route('categorias.create') }}" onclick="Agregarcategoría()"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#bbbaba] group">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </div>
                            <span class="flex-1 transition-opacity duration-300 ease-in-out transform opacity-0 ms-3 whitespace-nowrap">Agregar categoría</span>       </a>
                    </li>
                    <li>
                        <a href="{{ route('productos.create') }}" onclick="AgregarProducto()"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5V6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v1.5M3 7.5h18M3 7.5v9a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3v-9M9 12h6m-6 3h6" />
                                </svg>     </div>
                            <span class="flex-1 transition-opacity duration-300 ease-in-out transform opacity-0 ms-3 whitespace-nowrap">Agregar Producto</span>       </a>
                    </li>
                    <li>
                        <a href="#" onclick="GestionarRoles()"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                </svg>
                            </div>
                            <span class="flex-1 transition-opacity duration-300 ease-in-out transform opacity-0 ms-3 whitespace-nowrap">Gestionar Roles </span>       </a>
                    </li>

                    <li>
                        <a href="#" onclick="GestionarCarrucel()"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#bbbaba] group">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <span class="flex-1 transition-opacity duration-300 ease-in-out transform opacity-0 ms-3 whitespace-nowrap">Gestionar Carrusel</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categorias.index') }}" onclick="GestionarCategorias()"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-[#5989d1] group">
                            <div class="flex-shrink-0 w-6 h-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                            <span class="flex-1 transition-opacity duration-300 ease-in-out transform opacity-0 ms-3 whitespace-nowrap">Gestionar Categorias</span>       </a>
                    </li>

                </ul>
                    <ul class="nav-links">
                        <li>
                            <a href="#" onclick="soporte()">
                                <div class="flex-shrink-0 w-6 h-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>
                                </div>
                                <span class="flex-1 transition-opacity duration-300 ease-in-out transform opacity-0 ms-3 whitespace-nowrap">SOPORTE</span>
                            </a>
                        </li>
                    </ul>
            </div>
        </aside>
    </div>

    <div class="fixed z-[10000] top-4 left-4">
        <input id="toggle-sidebar" type="checkbox" class="hidden peer">
        <label for="toggle-sidebar" class="flex flex-col items-center justify-center space-y-1 cursor-pointer w-7 h-7">
            <!-- Línea 1 -->
            <div
                class="w-1/2 h-1 bg-white rounded-lg transition-all duration-300 origin-right peer-checked:w-full peer-checked:rotate-[-30deg] peer-checked:translate-y-[-4px]">
            </div>
            <!-- Línea 2 -->
            <div
                class="w-full h-1 transition-all duration-300 origin-center bg-blue-400 rounded-lg peer-checked:rotate-90 peer-checked:translate-x-2">
            </div>
            <!-- Línea 3 -->
            <div
                class="w-1/2 h-1 bg-white rounded-lg transition-all duration-300 origin-right peer-checked:w-full peer-checked:rotate-[30deg] peer-checked:translate-y-[4px]">
            </div>
        </label>
    </div>

<script>
    const sidebar = document.getElementById('default-sidebar');
    const sidebarMenu = document.getElementById('sidebar-menu');
    const sidebarLogo = document.getElementById('sidebar-logo');
    const toggleButton = document.getElementById('toggle-sidebar');
    const toggleIcon = document.getElementById('toggle-icon');
    const menuItems = document.querySelectorAll('#sidebar-menu span');
    const bottomImageContainer = document.getElementById('bottom-image-container');

    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-16');

        if (sidebar.classList.contains('w-16')) {
            menuItems.forEach(item => {
                item.classList.add('opacity-0', '-translate-x-2.5');
            });
            sidebarLogo.classList.remove('w-[70px]', 'h-[70px]');
            sidebarLogo.classList.add('w-[50px]', 'h-[50px]');
            bottomImageContainer.style.transform = 'translateX(0)';
            toggleIcon.innerHTML =
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>';
        } else {
            menuItems.forEach(item => {
                item.classList.remove('opacity-0', '-translate-x-2.5');
            });
            sidebarLogo.classList.remove('w-[50px]', 'h-[50px]');
            sidebarLogo.classList.add('w-[70px]', 'h-[70px]');
            bottomImageContainer.style.transform = 'translateX(12rem)';
            toggleIcon.innerHTML =
                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path>';
        }
    });
</script>
