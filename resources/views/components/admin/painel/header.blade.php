<header class="bg-gray-900 border-b border-gray-200">
    <nav class="flex items-center justify-between p-4">
        <button class="text-white focus:outline-none" id="toggleSidebar">
            <i class="fas fa-bars text-2xl"></i>
        </button>

        <div class="relative">
            <button id="userDropdownButton" class="flex items-center bg-gray-900 rounded p-2 text-white hover:text-red-500 focus:outline-none">
                <span class="mr-2">{{ auth()->user()->name }}</span>
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10 12l-5-5 1.5-1.5L10 9l3.5-3.5L15 7l-5 5z"/></svg>
            </button>

            <div id="userDropdownMenu" class="absolute hidden right-0 mt-2 w-48 bg-gray-950 border border-gray-200 rounded-lg shadow-md z-10 text-left">
                <a href="{{route('admin')}}" class="block px-4 py-2 text-white hover:text-red-500 rounded">
                    <i class="fas fa-home"></i> Início
                </a>
                <a href="{{route('usersEdit', ['user' => auth()->user()->id])}}" class="block px-4 py-2 text-white hover:text-red-500 rounded">
                    <i class="fas fa-pencil-alt"></i> Editar Usuário
                </a>
                <form class="dropdown-item mt-2 mb-2 ml-4" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white hover:text-red-500 rounded">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </button>
                </form>
            </div>
        </div>
    </nav>
</header>
