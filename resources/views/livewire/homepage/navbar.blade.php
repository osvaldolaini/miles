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
            <li class="li dark:bg-gray-800 dark:text-gray-50 cursor-pointer">
                <a href="#" class="a flex items-center p-2 space-x-3 rounded-md">
                    <span class="span ">
                        <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true" viewBox="0 0 24 24"
                            data-testid="HomeIcon">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path>
                        </svg>
                    </span>
                    <span class="span semibold">Home</span>
                </a>
            </li>
            <li class="li dark:bg-gray-800 dark:text-gray-50 cursor-pointer">
                <a href="#" class="a flex items-center p-2 space-x-3 rounded-md">
                    <span class="span ">
                        <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true" viewBox="0 0 24 24"
                            data-testid="QuestionAnswerIcon">
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z">
                            </path>
                        </svg>
                    </span>
                    <span class="span semibold">Chat</span>
                </a>
            </li>
            <li class="li dark:bg-gray-800 dark:text-gray-50 cursor-pointer">
                <a href="{{ route('demand.user') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                    <span class="span ">
                        <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true" viewBox="0 0 24 24"
                            data-testid="BookmarkRemoveIcon">
                            <path
                                d="M21 7h-6V5h6v2zm-2 3.9c-.32.07-.66.1-1 .1-2.76 0-5-2.24-5-5 0-1.13.37-2.16 1-3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V10.9z">
                            </path>
                        </svg>
                    </span>
                    <span class="span semibold">Meus pedidos</span>
                </a>
            </li>
            <li class="li dark:bg-gray-800 dark:text-gray-50 cursor-pointer">
                <a href="#" class="a flex items-center p-2 space-x-3 rounded-md">
                    <span class="span ">
                        <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true" viewBox="0 0 24 24"
                            data-testid="BookmarkAddIcon">
                            <path
                                d="M21 7h-2v2h-2V7h-2V5h2V3h2v2h2v2zm-2 14-7-3-7 3V5c0-1.1.9-2 2-2h7c-.63.84-1 1.87-1 3 0 2.76 2.24 5 5 5 .34 0 .68-.03 1-.1V21z">
                            </path>
                        </svg>
                    </span>
                    <span class="span semibold">Minhas ofertas</span>
                </a>
            </li>
            @if (Route::has('login'))
                <div class="top-0 right-0 px-6 py-5 sm:block">
                    <li class="flex items-center">
                        @auth
                            <div class="flex items-center mr-5">
                                <a href="{{ route('demand') }}" class="bg-teal-500
                                hover:bg-gray-900 border-2 border-teal-500
                                active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150" >
                                FAZER PEDIDO <span class="fa-solid fa-plus"></span>
                                </a>
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
