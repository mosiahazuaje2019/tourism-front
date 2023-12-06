<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Operaciones') }}
        </h2>
    </x-slot>

    <x-container class="py-4">
        <div class="p-4 bg-white rounded-lg">
            <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" accept=".csv,.xlsx">
                <button type="submit">Subir datos</button>
            </form>


        </div>
    </x-container>
</x-tenancy-layout>
