@extends('admin.master')
@section('title', 'Listar Cinemas')
@section('content')
    <div class="flex justify-center items-center">
        <h2 class="text-center text-black-500"><i class="fas fa-tenants"></i> Listar Cinemas</h2>
        <h2 class="title text-center ml-4">
            <a class="rounded p-1 bg-green-500 hover:bg-green-800 text-white" href="{{ route('tenantCreate') }}">
                <i class="fas fa-plus-circle"></i> Adicionar Cinema
            </a>
        </h2>
    </div>
    <div class="main-content text-center">
        <table class="table-auto mt-8">
            <thead>
                <tr>
                    <th class="px-4 py-2" scope="col">Cinema</th>
                    <th class="px-4 py-2" scope="col" colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tenants as $tenant)
                    <tr class="divide-x divide-gray-200">
                        <td class="px-6 py-2">{{ $tenant->id }}</td>
                        <td class="flex justify-center px-6 py-2">
                            <button onclick="listTenant('{{ $tenant->id }}')" class="p-2 rounded bg-yellow-500 hover:bg-yellow-800 text-white transition-colors duration-300">
                                <i class="far fa-eye"></i>
                            </button>
                            <a href="{{route('tenantEdit', ['tenant' => $tenant->id])}}" class="p-2 ml-2 rounded bg-blue-500 hover:bg-blue-800 text-white transition-colors duration-300">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form class="ml-2" action="{{ route('tenantDestroy', ['tenant' => $tenant->id]) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-800 text-white p-2 rounded transition-colors duration-300">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
<script>
    function listTenant(name) {
        Swal.fire({
            title: name,
            icon: 'info',
            showCancelButton: false,
            showCloseButton: true,
            confirmButtonText: 'Voltar'
        });
    }
</script>
@endsection
