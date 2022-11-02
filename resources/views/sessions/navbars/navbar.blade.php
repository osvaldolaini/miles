<!-- component -->
<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between
px-2 py-2 navbar-expand-lg bg-gray-900">
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start ">
        <a class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
            href="{{ url('') }}">
            SISTE<span class="text-teal-500 font-bold">MILHAS</span>
        </a>
        <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" onclick="toggleNavbar('example-collapse-navbar')">
            <span class="text-teal-500 fa-solid fa-bars"></span>
        </button>
    </div>
    <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden bg-gray-900" id="example-collapse-navbar">
      <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
        <li class="inline-block relative">

          <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="demo-pages-dropdown">
            <span class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
              Admin Layout
            </span>
            <a href="../admin/dashboard.html" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
              Dashboard
            </a>
            <a href="../admin/settings.html" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
              Settings
            </a>
            <a href="../admin/tables.html" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
              Tables
            </a>
            <a href="../admin/maps.html" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
              Maps
            </a>
            <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div>
            <span class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
              Auth Layout
            </span>
            <a href="./login.html" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
              Login
            </a>
            <a href="./register.html" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
              Register
            </a>
            <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div>
            <span class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
              No Layout
            </span>
            <a href="../landing.html" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
              Landing
            </a>
            <a href="../profile.html" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
              Profile
            </a>
          </div>
        </li>

            @if (Route::has('login'))
                <div class="top-0 right-0 px-6 py-5 sm:block">
                    <li class="flex items-center">
                        @auth
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
                        {{-- <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot> --}}

                        @endauth

                    </li>
                </div>
            @endif
      </ul>
    </div>
  </div>
</nav>

