<div class="navbar bg-gray-900 px-4">
    <div class="navbar-start">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start ">
                <a class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="{{ url('app') }}">
                    SISTE<span class="text-teal-500 font-bold">MILHAS</span>
                </a>
            </div>
        </div>
    </div>
    <div class="navbar-end">
        <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0
        lg:shadow-none hidden bg-gray-900">
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                @if (Route::has('login'))
                    <div class="top-0 right-0 px-6 py-5 sm:block">
                        <li class="flex items-center">
                            @auth
                                <div class="flex items-center">
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

        <details class="dropdown dropdown-end sm:hidden">
            <summary tabindex="0" class="btn btn-ghost btn-circle">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8 text-teal-500">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" style="display: none"></path>
                </svg>
            </summary>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                @if (Route::has('login'))
                    @auth
                        <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                            <div class="flex items-center">
                                <a href="{{ route('demand') }}"
                                    class="bg-teal-500
                                    hover:bg-gray-900 border-2 border-teal-500
                                    active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5
                                    rounded-full shadow hover:shadow-md outline-none focus:outline-none
                                    lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                    FAZER PEDIDO <span class="fa-solid fa-plus"></span>
                                </a>
                            </div>
                        </li>
                        <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                            <a href="{{ route('app') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                                <span class="span ">
                                    <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                        viewBox="0 0 24 24" data-testid="HomeIcon">
                                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path>
                                    </svg>
                                </span>
                                <span class="span semibold">Home</span>
                            </a>
                        </li>
                        <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                            <a href="{{ route('chats') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                                <span class="span ">
                                    <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                        viewBox="0 0 24 24" data-testid="QuestionAnswerIcon">
                                        <path
                                            d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="span semibold">Chat</span>
                            </a>
                        </li>
                        <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                            <a href="{{ route('demand.user') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                                <span class="span ">
                                    <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                        viewBox="0 0 24 24" data-testid="BookmarkRemoveIcon">
                                        <path
                                            d="M21 7h-6V5h6v2zm-2 3.9c-.32.07-.66.1-1 .1-2.76 0-5-2.24-5-5 0-1.13.37-2.16 1-3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V10.9z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="span semibold">Meus pedidos</span>
                            </a>
                        </li>
                        <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                            <a href="{{ route('like.demand.user') }}"
                                class="a flex items-center p-2 space-x-3 rounded-md">
                                <span class="span ">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span class="span semibold">Meus favoritos</span>
                            </a>
                        </li>
                        <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                            <a href="{{ route('offer.list.user') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                                <span class="span ">
                                    <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                        viewBox="0 0 24 24" data-testid="BookmarkAddIcon">
                                        <path
                                            d="M21 7h-2v2h-2V7h-2V5h2V3h2v2h2v2zm-2 14-7-3-7 3V5c0-1.1.9-2 2-2h7c-.63.84-1 1.87-1 3 0 2.76 2.24 5 5 5 .34 0 .68-.03 1-.1V21z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="span semibold">Minhas ofertas</span>
                            </a>
                        </li>
                        <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                            <a href="{{ route('account.user') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                                <span class="span ">
                                    <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22,17a4,4,0,1,1-4-4A4,4,0,0,1,22,17ZM21,3H4A2,2,0,0,0,2,5V19a2,2,0,0,0,2,2h9.54A5.99,5.99,0,0,1,22,12.54V8a1,1,0,0,0-1-1H5A1,1,0,0,1,5,5H22V4A1,1,0,0,0,21,3Z" />
                                    </svg>
                                </span>
                                <span class="span semibold">Minhas contas</span>
                            </a>
                        </li>

                        <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a class="a flex items-center p-2 space-x-3 rounded-md" href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="li dark:bg-gray-900 dark:text-white cursor-pointer">
                            <a href="{{ route('login') }}"
                                class="bg-teal-500
                            hover:bg-gray-900 border-2 border-teal-500
                            active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                Entrar
                            </a>

                        </li>
                        <li class="li dark:bg-gray-900 dark:text-white cursor-pointer">
                            <a href="{{ route('register') }}"
                                class="
                                border-2 border-teal-500 bg-gray-900 text-white
                                hover:bg-teal-500
                                active:bg-teal-300 active:text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                                Registrar
                            </a>
                        </li>
                    @endauth
                @endif
            </ul>
        </details>
    </div>
</div>
