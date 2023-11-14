<div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre de Razon social</th>
                    <th scope="col" class="px-6 py-3">Nombre comercial</th>
                    <th scope="col" class="px-6 py-3">Telefono</th>
                    <th scope="col" class="px-6 py-3">Correo</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                <tr wire:key="{{ $user->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->company_name }}</th>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->phone }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td>
                        <button type="button" wire:click="approve({{ $user->id}})" class="bg-green-500 hover:bg-blue-700 duration-300 text-white font-bold py-2 px-4 rounded">Aprobacion</button>
                        <button type="button" class="bg-red-700 hover:bg-blue-700 duration-300 text-white font-bold py-2 px-4 rounded">Negar</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
