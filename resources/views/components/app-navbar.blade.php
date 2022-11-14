<div class="lg:hidden top-0 absolute z-50 w-full flex flex-wrap items-center justify-between
px-2 py-2 navbar-expand-lg bg-gray-900 mx-auto ">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <!-- Navbar -->
        <div class="w-full navbar bg-gray-900">
            <div class="flex-1 px-2 mx-2">
                <a class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="{{ url('app') }}">
                    SISTE<span class="text-teal-500 font-bold">MILHAS</span>
                </a>
            </div>
            <div class="flex-none lg:hidden" x-data="{ open: false }">
                <label for="my-drawer-3"  @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8 text-teal-500">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none"></path>
                    </svg>
                </label>
            </div>
        </div>
    <div class="drawer-side ">
        <label for="my-drawer-3" class="drawer-overlay">
            <ul class="menu p-4 bg-gray-900 text-teal-500">
                <!-- Sidebar content here -->
                @auth
                    <div class="divide-y divide-gray-700 Sidebar" id="Sidebar"></div>
                @endauth
                @auth
                        <li class="text-md text-bold">
                            <a href="{{ route('user.index') }}" >
                            Meu cadastro
                            </a>
                        </li>
                        <li class="text-md text-bold">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();" >
                                    Sair
                                </a>
                            </form>
                        </li>
                    @else
                        <li class="text-md text-bold">
                            <a href="{{ route('login') }}" >
                                Entrar
                            </a>
                        </li>
                        <li class="text-md text-bold">
                            <a href="{{ route('register') }}" >
                                Registrar
                            </a>
                        </li>
                    @endauth
            </ul>
        </label>

    </div>
  </div>
{{-- <div class=" w-full max-w-7xl">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl p-5 mx-auto md:items-right justify-end md:flex-row md:px-6 lg:px-8">
        <div class="flex flex-row items-right justify-end">
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8 text-teal-500">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden  md:justify-end md:flex-row">
            <ul class="space-y-2 list-none lg:space-y-0 lg:items-right lg:inline-flex">
                @auth
                    <div class="divide-y divide-gray-700 Sidebar" id="Sidebar">
                    </div>
                @endauth
                <li class="text-md text-bold">
                    <a href="#" > Faq </a>
                </li>
                @auth
                    <li class="text-md text-bold">
                        <a href="{{ route('user.index') }}" class="px-2 lg:px-6 py-6 text-sm border-b-2 border-transparent leading-[22px] md:px-3 text-teal-500 hover:text-teal-900 hover:border-teal-600">
                        Meu cadastro
                        </a>
                    </li>
                    <li class="text-md text-bold">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();" class="px-2 lg:px-6 py-6 text-sm border-b-2 border-transparent leading-[22px] md:px-3 text-teal-500 hover:text-teal-900 hover:border-teal-600">
                                Sair
                            </a>
                        </form>
                    </li>
                @else
                    <li class="text-md text-bold">
                        <a href="{{ route('login') }}" class="px-2 lg:px-6 py-6 text-sm border-b-2 border-transparent leading-[22px] md:px-3 text-teal-500 hover:text-teal-900 hover:border-teal-600">
                            Entrar
                        </a>
                    </li>
                    <li class="text-md text-bold">
                        <a href="{{ route('register') }}" class="px-2 lg:px-6 py-6 text-sm border-b-2 border-transparent leading-[22px] md:px-3 text-teal-500 hover:text-teal-900 hover:border-teal-600">
                            Registrar
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</div> --}}
