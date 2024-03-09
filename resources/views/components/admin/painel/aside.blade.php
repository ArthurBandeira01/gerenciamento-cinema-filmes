<aside class="flex min-h-full w-64 bg-gray-900 text-white rounded" id="sidebar">
    <div class="flex flex-col justify-between py-8">
        <div>
            <div class="px-6">
                <a href="{{route("admin")}}" class="text-2xl font-semibold"><b>Jet</b>movie</a>
            </div>

            <nav class="mt-10">
                <ul>
                    <li class="px-6 py-2">
                        @if(isset($tenantVerify)) <a href="{{route('adminTenant')}}"
                        @else <a href="{{route('admin')}}"
                        @endif
                        class="flex items-center text-gray-300 hover:text-red-500">
                             <i class="fas fa-home mr-4"></i> Início
                        </a>
                    </li>
                    <li class="px-6 py-2 mt-5">
                        @if(isset($tenantVerify)) <a href="{{route('usersTenant')}}"
                        @else <a href="{{route('users')}}"
                        @endif
                         class="flex items-center text-gray-300 hover:text-red-500">
                            <i class="fas fa-users mr-4"></i> Usuários
                        </a>
                    </li>
                    @if (!$tenantVerify)
                    <li class="px-6 py-2 mt-5">
                        <a href="{{route('tenants')}}" class="flex items-center text-gray-300 hover:text-red-700">
                            <i class="fas fa-film mr-4"></i> Gerenciar Cinemas
                        </a>
                    </li>
                    @endif
                    @if(isset($tenantVerify))
                    <li class="px-6 py-2 mt-5">
                        <a href="{{route('rooms')}}" class="flex items-center text-gray-300 hover:text-red-700">
                            <i class="fas fa-door-closed mr-4"></i> Salas do Cinema
                        </a>
                    </li>
                    <li class="px-6 py-2 mt-5">
                        <a href="{{route('sessionRoom')}}" class="flex items-center text-gray-300 hover:text-red-700">
                            <i class="fas fa-ticket-alt mr-4"></i> Sessões das Salas
                        </a>
                    </li>
                    <li class="px-6 py-2 mt-5 relative">
                        <div class="relative">
                            <button id="reportDropdownButton" class="flex bg-gray-900 rounded text-white
                            hover:text-red-500 focus:outline-none">
                                <i class="fas fa-file-signature mr-4"></i>
                                Relatórios <i class="fas fa-sort-down ml-2"></i>
                            </button>

                            <div id="reportListDropdownMenu" class="absolute hidden right-0 mt-2 w-48 bg-gray-950
                            rounded-lg shadow-md z-10 text-left">
                                <a href="{{route('admin')}}" class="block px-4 py-2 text-white
                                hover:text-red-500 rounded">
                                    <i class="fas fa-file-alt"></i> Valor arrecadado por filme
                                </a>
                                <a href="" class="block px-4 py-2 text-white hover:text-red-500 rounded">
                                    <i class="fas fa-file-alt"></i> Valor arrecadado por semana
                                </a>
                                <a href="" class="block px-4 py-2 text-white hover:text-red-500 rounded">
                                    <i class="fas fa-file-alt"></i> Mais visualizados
                                </a>
                            </div>
                        </div>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>

        <footer class="px-6">
            <p class="text-xs text-gray-400">
                <i class="far fa-copyright"></i>
                <b>Jet</b>movie - Todos os direitos reservados 2024
            </p>
        </footer>
    </div>
</aside>
