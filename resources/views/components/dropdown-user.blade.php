<div x-data="{ open: false }" class="border-2 border-teal-500 bg-gray-900
active:bg-teal-300  text-xs font-bold uppercase px-6 py-2.5 rounded-full shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
    <div @click="open = !open"  class="relative border-transparent" >
        <div class="flex justify-center items-center space-x-3 cursor-pointer">
            <span class="fa-solid fa-2x fa-user-circle text-teal-500 "></span>
            <div class="font-semibold text-white">
                <div class="cursor-pointer">{{ strtok(Auth::user()->name, " ") }}
                    <span class="fa-solid fa-chevron-down text-teal-500 pl-0.5"> </span>
                </div>
            </div>
        </div>
    <div x-show="open"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="absolute right-0 w-64 px-5 py-3 dark:bg-gray-800 overflow-hidden bg-white rounded-md shadow-lg border dark:border-transparent mt-6">

        <ul class="space-y-3 dark:text-white">
        <li class="font-medium">
            <a href="{{ route('user.index') }}" class="flex items-center transform transition-colors border-r-4 border-transparent hover:border-teal-500">
            <div class="mr-3">
                <i class="fa-solid fa-2x fa-user"></i>
            </div>
            Meu cadastro
            </a>
        </li>
        {{-- <li class="font-medium">
            <a href="#" class="flex items-center transform transition-colors border-r-4 border-transparent hover:border-teal-500">
            <div class="mr-3">
                <i class="fa-solid fa-2x fa-gear"></i>
            </div>
            Setting
            </a>
        </li> --}}
        <hr class="dark:border-gray-700">
        <li class="font-medium">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();" class="flex items-center transform transition-colors border-r-4 border-transparent hover:border-teal-500">
                    <div class="mr-3">
                        <i class="fa-solid fa-2x fa-right-from-bracket"></i>
                    </div>
                    Sair
                </a>
            </form>
            </a>
        </li>
        </ul>
    </div>
    </div>
</div>
