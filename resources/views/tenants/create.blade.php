<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Compañias') }}
        </h2>
    </x-slot>
    <x-container class="py-8 text-white">
        <div class="card bg-slate-400 rounded-lg shadow-lg py-4 px-4">
            <div class="card-body">
                <form action="{{ route('tenants.store') }}" method="POST">
                    @csrf
                    <div class="py-4">
                        <input-label>Nombre</input-label>
                        <x-text-input  class="my-2 w-full" name="id" type="text" placeholder="Ingrese el nombre" />
                        @error('id')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                </svg>
                                <div class="px-2">
                                    Guardar
                                </div>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
</x-app-layout>
