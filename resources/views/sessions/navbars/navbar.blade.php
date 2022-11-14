<!-- component -->
<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between
px-2 py-2 navbar-expand-lg bg-gray-900" x-data="{ open: false }">
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start ">
        <a class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
            href="{{ url('app') }}">
            SISTE<span class="text-teal-500 font-bold">MILHAS</span>
        </a>
        {{-- <button class="cursor-pointer text-xl leading-none px-3 py-1
        border border-solid border-transparent rounded bg-transparent block
        lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('sistemilhas-collapse-navbar')">
            <span class="text-teal-500 fa-solid fa-bars"></span>
        </button> --}}
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8 text-teal-500">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none"></path>
            </svg>
        </button>
    </div>
    <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0
    lg:shadow-none hidden bg-gray-900" id="sistemilhas-collapse-navbar" :class="{'flex': open, 'hidden': !open}"
    x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">
      <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
        @auth
            <div class="lg:hidden divide-y divide-gray-700 Sidebar" id="Sidebar">
            </div>
            <li class="font-medium">
                <a href="{{ route('user.index') }}" class="flex items-center transform transition-colors border-r-4 border-transparent hover:border-teal-500">
                <div class="mr-3">
                    <i class="fa-solid fa-2x fa-user"></i>
                </div>
                Meu cadastro
                </a>
            </li>
        @endauth
        <li class="inline-block relative">
            <div class="bg-white text-base z-50 float-left
            py-2 list-none text-left rounded shadow-lg min-w-48" id="demo-pages-dropdown">
              @auth
                  <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="demo-pages-dropdown">
                      <div class="divide-y divide-gray-700 Sidebar" id="Sidebar">
                      </div>
                      <div class="flex items-center mr-5">
                          <a href="{{ route('demand.create') }}" class="bg-teal-500
                          hover:bg-gray-900 border-2 border-teal-500
                          active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150" >
                          FAZER PEDIDO <span class="fa-solid fa-plus"></span>
                          </a>
                      </div>
                      <x-dropdown-user></x-dropdown-user>
                  </div>
              @else
                  <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="demo-pages-dropdown">
                      <a href="{{ route('login') }}" class="bg-teal-500
                      hover:bg-gray-900 border-2 border-teal-500
                      active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150" >
                      Entrar
                      </a>
                      <a href="{{ route('register') }}" class="
                      border-2 border-teal-500 bg-gray-900 text-white
                      hover:bg-teal-500
                      active:bg-teal-300 active:text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150" >
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
                                <a href="{{ route('demand.create') }}" class="bg-teal-500
                                hover:bg-gray-900 border-2 border-teal-500
                                active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150" >
                                FAZER PEDIDO <span class="fa-solid fa-plus"></span>
                                </a>
                            </div>
                            <div class="flex items-center mr-5">
                                <x-dropdown-alerts></x-dropdown-user>
                            </div>
                            <x-dropdown-user></x-dropdown-user>
                        @else
                            <a href="{{ route('login') }}" class="bg-teal-500
                            hover:bg-gray-900 border-2 border-teal-500
                            active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150" >
                             Entrar
                            </a>
                            <a href="{{ route('register') }}" class="
                            border-2 border-teal-500 bg-gray-900 text-white
                            hover:bg-teal-500
                            active:bg-teal-300 active:text-white text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150" >
                                 Registrar
                            </a>
                        @endauth

                    </li>
                </div>
            @endif
      </ul>
    </div>
  </div>
</nav>

