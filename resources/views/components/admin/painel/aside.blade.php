<aside class="flex min-h-full w-64 bg-gray-900 text-white rounded" id="sidebar">
    <div class="flex flex-col justify-between py-8">
        <div>
            <div class="px-6">
                <a href="{{route("admin")}}" class="text-2xl font-semibold"><b>Jet</b>movie</a>
            </div>

            <nav class="mt-10">
                <ul>
                    <li class="px-6 py-2">
                        <a href="{{route('admin')}}" class="flex items-center text-gray-300 hover:text-red-500">
                             <i class="fas fa-home mr-4"></i> Início
                        </a>
                    </li>
                    <li class="px-6 py-2 mt-5">
                        @if (isset($tenantVerify))
                            <a href="{{route('users')}}" class="flex items-center text-gray-300 hover:text-red-500">
                                <i class="fas fa-users mr-4"></i> Usuários
                            </a>
                        @else
                            <a href="{{route('users')}}" class="flex items-center text-gray-300 hover:text-red-500">
                                <i class="fas fa-users mr-4"></i> Usuários
                            </a>
                        @endif
                    </li>
                    <li class="px-6 py-2 mt-5">
                        <a href="{{route('tenants')}}" class="flex items-center text-gray-300 hover:text-red-700">
                            <i class="fas fa-film mr-4"></i> Gerenciar Cinemas
                        </a>
                    </li>
                    <li class="px-6 py-2 mt-5">
                        <a href="{{route('rooms')}}" class="flex items-center text-gray-300 hover:text-red-700">
                            <i class="fas fa-door-closed"></i> Salas do Cinema
                        </a>
                    </li>
                    <li class="px-6 py-2 mt-5">
                        <a href="{{route('sessionRooms')}}" class="flex items-center text-gray-300 hover:text-red-700">
                            <i class="fas fa-ticket-alt"></i> Sessões das Salas
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <footer class="px-6">
            <p class="text-xs text-gray-400"><i class="far fa-copyright"></i> <b>Jet</b>movie - Todos os direitos reservados 2024</p>
        </footer>
    </div>
</aside>
