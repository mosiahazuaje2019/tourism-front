<x-tenancy-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Operaciones') }}
        </h2>
    </x-slot>

    <x-container class="py-12 mx-60">
        <div class="card bg-slate-600 p-10 rounded-lg">
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="card-body text-black">
                    <div class="mb-4">
                        <x-input-label>
                            PAX:
                        </x-input-label>
                        <x-text-input type="text" name="pax" class="w-full" value="{{old('pax')}}" />
                    </div>
                    <div class="mb-4">
                        <select name="service" id="service" class="form-control w-full">
                            <option value="">Seleccione...</option>
                            @foreach ($services as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <x-input-label>
                            Cliente:
                        </x-input-label>
                        <x-text-input type="text" name="client_name" class="w-full" value="{{old('client_name')}}" />
                    </div>
                    <div class="mb-4">
                        <x-input-label>
                            Hotel:
                        </x-input-label>
                        <x-text-input type="text" name="hotel" class="w-full" value="{{old('hotel')}}" />
                    </div>
                    <div class="mb-4">
                        <x-input-label>
                            Vuelo:
                        </x-input-label>
                        <x-text-input type="text" name="flight" class="w-full" value="{{old('flight')}}" />
                    </div>
                    <div class="mb-4">
                        <x-input-label>
                            Fecha:
                        </x-input-label>
                        <x-text-input type="date" name="date" class="w-full" value="{{old('date')}}" />
                    </div>
                    <div class="mb-4">
                        <x-input-label>
                            Hora:
                        </x-input-label>
                        <x-text-input type="time" name="time" class="w-full" value="{{old('time')}}" />
                    </div>
                    <div class="mb-4">
                        <x-input-label>
                            Comentarios:
                        </x-input-label>
                        <textarea class="form-control w-full" name="comments">{{old('comments')}}</textarea>
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
</x-tenancy-layout>
