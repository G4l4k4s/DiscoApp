<!-- resources/views/index.blade.php -->
@extends('layouts.personal')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-4xl font-extrabold text-center text-gray-800 dark:text-gray-200 mb-10">Gestión de Roles</h1>

    <div class="flex justify-end mb-6">
        <a href="{{ route('roles.create') }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            Agregar Rol
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-6 py-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-left text-sm font-semibold uppercase tracking-wider">
                        Nombre
                    </th>
                    <th class="px-6 py-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-left text-sm font-semibold uppercase tracking-wider">
                        Rol
                    </th>
                    <th class="px-6 py-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-left text-sm font-semibold uppercase tracking-wider">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200 ease-in-out">
                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            <p class="text-gray-900 dark:text-gray-100 font-medium">{{ $role->name }}</p>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            <p class="text-gray-700 dark:text-gray-300">{{ $role->description }}</p>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                            <div class="flex space-x-4">
                                <a href="{{ route('roles.edit', $role->id) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-500 transition duration-300 ease-in-out">
                                    Editar
                                </a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este rol?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-500 transition duration-300 ease-in-out">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No hay roles disponibles.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    {{-- <div class="mt-6">
        {{ $roles->links() }}
    </div> --}}
</div>
@endsection
