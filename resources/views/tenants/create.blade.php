<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Compañias') }}
        </h2>
    </x-slot>
    <x-container class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-white font-bold">
        <div class="card bg-slate-700 rounded-lg shadow-lg py-4 px-4 mt-4">
            <div class="card-header">
                <h2 class="text-2xl font-bold text-white mb-4">Generar activación de empresa</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('tenants.store') }}" method="POST" class="w-full">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/6 px-3 mb-6 md:mb-0">
                            <input-label>Id</input-label>
                            <x-text-input value="{{ $preusers->id }}" class="w-full bg-transparent" readonly=true name="pre_user_id" />
                        </div>
                        <div class="w-full md:w-full px-3">
                            <input-label>Nombre de razón social</input-label>
                            <x-text-input value="{{ $preusers->company_name }}" class="w-full bg-transparent" readonly=true />
                        </div>
                        <div class="w-full md:w-full px-3">
                            <input-label>Nombre comercial</input-label>
                            <x-text-input value="{{ $preusers->name }}" class="w-full bg-transparent" readonly=true />
                        </div>
                        <div class="md:flex md:flex-1 -mx-3 mb-4 px-3 mt-8">
                            <div class="w-full px-3">
                                <input-label>Nombre para el dominio del usuario</input-label>
                                <x-text-input  class="w-full bg-transparent" name="id" type="text" placeholder="Ingrese el nombre" />
                                @error('id')
                                    <span class="text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="flex h-10 px-3 mt-14">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 duration-300 text-white font-bold py-0 px-4 rounded-lg">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>
                                    <div class="px-4">
                                        Guardar
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
</x-app-layout>
