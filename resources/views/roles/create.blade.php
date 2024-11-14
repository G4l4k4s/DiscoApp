<!-- resources/views/roles/create.blade.php -->
@extends('layouts.personal')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-extrabold text-center text-gray-800 dark:text-gray-200 mb-8">Create a New Role</h1>

    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Name of rol
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100"
                    placeholder="Ingrese el nombre del rol">
                @error('name')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Description of rol
                </label>
                <textarea id="description" name="description" rows="4" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:text-gray-100"
                    placeholder="Ingrese una descripción para el rol">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Save role
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
