@php
    $links = [
        [
            'name' => 'Dashoard',
            'url' => route('dashboard'),
            'active' => request()->routeIs('dashboard')
        ],
        [
            'name' => 'Operaciones',
            'url' => route('bookings.index'),
            'active' => request()->routeIs('bookings.*')
        ],
    ];
@endphp
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
<!--                 <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="h-[50px]">
                    </a>
                </div> -->

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach ($links as $link)
                        <x-nav-link href="{{$link['url']}}" :active="$link['active']">
                            {{ $link['name'] }}
                        </x-nav-link>
                    @endforeach
                    <form method="POST" class="space-x-8 sm:-my-px sm:ml-10 flex flex-1" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar Session') }}
                        </x-nav-link>
                    </form>
                </div>
            </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($links as $link)
                <x-responsive-nav-link href="{{ $link['url'] }}" :active="$link['active']">
                    {{ $link['name'] }}
                </x-responsive-nav-link>
            @endforeach
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

    </div>
</nav>
