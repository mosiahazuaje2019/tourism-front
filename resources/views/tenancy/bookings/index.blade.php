<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Operaciones') }}
        </h2>
    </x-slot>

    <x-container class="py-4">
        <div class="flex justify-end">
            <a href="{{ route('bookings.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="px-2">
                        Nuevo
                    </div>
                </div>
            </a>
            <div class="flex mx-4">
                <!-- Modal toggle -->
                <a href="/upload" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button">
                Importar datos
                </a>
            </div>
        </div>

        <div class="my-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PAX
                            </th>
                            <th>
                                Tipo de servicio
                            </th>
                            <th>
                                Cliente
                            </th>
                            <th>
                                Hospedaje
                            </th>
                            <th>
                                Aerolinea / Vuelo
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Hora
                            </th>
                            <th>
                                Comentarios
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $booking->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $booking->pax }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->service }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->client_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->hotel }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->flight }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->time }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $booking->comments }}
                                </td>
                                <td>
                                    <div class="flex justify-end px-4">
                                        <a href="{{ route('bookings.edit', $booking) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                        <form action="{{ route('bookings.destroy', $booking) }}" class="px-4" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-container>
</x-tenancy-layout>
