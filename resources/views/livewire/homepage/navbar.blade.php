<!-- component -->
<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between
px-2 py-2 navbar-expand-lg bg-gray-900"
    x-data="{ open: false }">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start ">
            <a class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                href="{{ url('app') }}">
                SISTE<span class="text-teal-500 font-bold">MILHAS</span>
            </a>
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8 text-teal-500">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" style="display: none"></path>
                </svg>
            </button>
        </div>
        <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0
            lg:shadow-none hidden bg-gray-900">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                @if (Route::has('login'))
                    <div class="top-0 right-0 px-6 py-5 sm:block">
                        <li class="flex items-center">
                            @auth
                                <div class="flex items-center mr-5">
                                    <a href="{{ route('demand') }}"
                                        class="bg-teal-500
                                        hover:bg-gray-900 border-2 border-teal-500
                                        active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5
                                        rounded-full shadow hover:shadow-md outline-none focus:outline-none
                                        lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                        FAZER PEDIDO <span class="fa-solid fa-plus"></span>
                                    </a>
                                </div>
                                <x-dropdown align="right">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex border-2 border-teal-500 bg-gray-900 text-white
                                            active:bg-teal-300 hover:bg-teal-300 text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow
                                            hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear
                                            transition-all duration-150">
                                                {{ Auth::user()->name }}
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        {{-- <!-- Account Management -->
                                    <div class="block px-5 py-5 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div> --}}


                                        <x-dropdown-link href="{{ route('profile.user') }}">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf

                                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @else
                                <a href="{{ route('login') }}"
                                    class="bg-teal-500
                            hover:bg-gray-900 border-2 border-teal-500
                            active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                    Entrar
                                </a>
                                <a href="{{ route('register') }}"
                                    class="
                            border-2 border-teal-500 bg-gray-900 text-white
                            hover:bg-teal-500
                            active:bg-teal-300 active:text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                    Registrar
                                </a>
                            @endauth

                        </li>
                    </div>
                @endif
            </ul>
        </div>
    </div>
    <div class="w-full items-center justify-end md:justify-between" :class="{ 'flex': open, 'hidden': !open }">
        <ul class="flex w-full flex-col list-none items-center">
            <li class="inline-block relative">
                <div class="bg-gray-900  float-left
            py-2 list-none text-center text-bold text-teal-500 min-w-48"
                    id="demo-pages-dropdown">
                    @auth
                        <a href="{{ url('/app') }}"
                            class="text-sm py-2 px-4
                    font-bold block w-full whitespace-nowrap bg-transparent
                    text-bold text-teal-500 ">
                            Home
                        </a>
                        <a href="{{ url('/app') }}"
                            class="text-sm py-2 px-4
                    font-bold block w-full whitespace-nowrap bg-transparent
                    text-bold text-teal-500 ">
                            Chat
                        </a>
                        <a href="{{ url('/meus-pedidos') }}"
                            class="text-sm py-2 px-4
                    font-bold block w-full whitespace-nowrap bg-transparent
                    text-bold text-teal-500 ">
                            Meus pedidos
                        </a>
                        <a href="{{ url('/minhas-ofertas') }}"
                            class="text-sm py-2 px-4
                    font-bold block w-full whitespace-nowrap bg-transparent
                    text-bold text-teal-500 ">
                            Minhas ofertas
                        </a>

                        <a href="{{ route('profile.user') }}" class="text-sm py-2 px-4
                        font-bold block w-full whitespace-nowrap bg-transparent
                        text-bold text-teal-500 ">
                        Meu cadastro
                    </a>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @else
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="demo-pages-dropdown">
                            <a href="{{ route('login') }}"
                                class="bg-teal-500
                    hover:bg-gray-900 border-2 border-teal-500
                    active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                Entrar
                            </a>
                            <a href="{{ route('register') }}"
                                class="
                    border-2 border-teal-500 bg-gray-900 text-white
                    hover:bg-teal-500
                    active:bg-teal-300 active:text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                Registrar
                            </a>
                        </div>
                    @endauth

                </div>
            </li>
            @if (Route::has('login'))
                <div class="top-0 right-0 px-6 py-5 sm:block">
                    <li class="flex items-center">
                        @auth
                            <div class="flex items-center mr-5">
                                {{-- <a href="{{ route('demand.create') }}" class="bg-teal-500
                                hover:bg-gray-900 border-2 border-teal-500
                                active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150" >
                                FAZER PEDIDO <span class="fa-solid fa-plus"></span>
                                </a> --}}
                            </div>
                            {{-- <div class="items-center mr-5 hidden lg:flex">
                                <x-dropdown-alerts></x-dropdown-user>
                            {{-- </div> --}}
                        @else
                            <a href="{{ route('login') }}"
                                class="bg-teal-500
                            hover:bg-gray-900 border-2 border-teal-500
                            active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                Entrar
                            </a>
                            <a href="{{ route('register') }}"
                                class="
                            border-2 border-teal-500 bg-gray-900 text-white
                            hover:bg-teal-500
                            active:bg-teal-300 active:text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                Registrar
                            </a>
                        @endauth

                    </li>
                </div>
            @endif
        </ul>
    </div>
</nav>
