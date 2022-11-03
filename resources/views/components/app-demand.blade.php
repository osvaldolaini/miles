@props(['data'])

@if ($data)
    {{-- <div class="container-fluid rounded-lg shadow-md py-2 bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
        <div class="flex items-center justify-between py-0 px-3">
            <div class="flex items-center space-x-2">
                <img src="https://source.unsplash.com/50x50/?portrait" alt="" class="object-cover object-center w-8 h-8 rounded-full shadow-sm dark:bg-gray-500 dark:border-gray-700">
                <div class="-space-y-1">
                    <h2 class="text-sm font-semibold leading-none">leroy_jenkins72</h2>
                    <span class="inline-block text-xs leading-none dark:text-gray-400">Iniciante</span>
                </div>
            </div>
            <div class="text-right">
                <h1 class="text-xl font-bold mt-0 pt-0" >6.000 Milhas</h1>
                <h2 class="text-lg font-bold mt-0 pt-0" >2 CPF</h2>
                <h2 class="text-md font-bold mt-0 pt-0" >Valor R$ 23,00</h2>
                <div class="mt-3">
                    <a href="{{ route('login') }}" class="bg-teal-500
                        hover:bg-gray-900 border-2 border-teal-500
                        active:bg-teal-300 text-white text-xs
                        font-bold uppercase px-6 py-2.5 rounded-full
                        shadow hover:shadow-md outline-none focus:outline-none
                        mr-0 lg:mb-0 ml-3 mx-4  ease-linear transition-all
                        duration-150" >
                    Fazer oferta
                    </a>
                </div>
            </div>
        </div>
        <div class="px-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <button type="button" title="Like post" class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                            <path d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z"></path>
                        </svg>
                    </button>
                    <button type="button" title="Share post" class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                            <path d="M474.444,19.857a20.336,20.336,0,0,0-21.592-2.781L33.737,213.8v38.066l176.037,70.414L322.69,496h38.074l120.3-455.4A20.342,20.342,0,0,0,474.444,19.857ZM337.257,459.693,240.2,310.37,389.553,146.788l-23.631-21.576L215.4,290.069,70.257,232.012,443.7,56.72Z"></path>
                        </svg>
                    </button>
                    <div class="flex flex-wrap items-center pt-3 pb-1 cursor-pointer">
                        <div class="flex items-center space-x-2">
                            <div class="flex -space-x-4">
                                <img alt="" class="w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800" src="https://source.unsplash.com/40x40/?portrait?1">
                                <img alt="" class="w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800" src="https://source.unsplash.com/40x40/?portrait?2">
                                <img alt="" class="w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800" src="https://source.unsplash.com/40x40/?portrait?3">
                            </div>
                            <span class="text-sm">6 pessoas
                                <span class="font-semibold">fizeram oferta</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <p class="text-sm text-right">
                    <span class="text-base font-semibold">Publicado à </span> 1h
                </p>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid rounded-lg shadow-md py-2 bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
        <div class="flex items-center justify-between py-0 px-3">
            <div class="flex items-center space-x-2">
                @if ($data->user->avatar)
                    <img src="{{ url('storage/profiles/'.$data->user->avatar) }}" alt="sistemilhas-avatar-{{ $data->user->username }}" class="object-cover object-center w-8 h-8 rounded-full shadow-sm dark:bg-gray-500 dark:border-gray-700">
                @else
                    <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar" class="object-cover object-center w-8 h-8 rounded-full shadow-sm dark:bg-gray-500 dark:border-gray-700">
                @endif
                <div class="-space-y-1">
                    <h2 class="text-sm font-semibold leading-none">{{ $data->user->username }}</h2>
                    <span class="inline-block text-xs leading-none dark:text-gray-400">Iniciante</span>
                </div>
            </div>
            <div class="text-right">
                <h1 class="text-xl font-bold mt-0 pt-0" >{{ $data->miles }} Milhas</h1>
                <h2 class="text-lg font-bold mt-0 pt-0" >{{ $data->qtd }} CPF</h2>
                <h2 class="text-md font-bold mt-0 pt-0" >Valor R$ {{ number_format($data->value, 2, ',', '.') }}</h2>
                <div class="mt-3">
                    <a href="{{ route('login') }}" class="bg-teal-500
                        hover:bg-gray-900 border-2 border-teal-500
                        active:bg-teal-300 text-white text-xs
                        font-bold uppercase px-6 py-2.5 rounded-full
                        shadow hover:shadow-md outline-none focus:outline-none
                        mr-0 lg:mb-0 ml-3 mx-4  ease-linear transition-all
                        duration-150" >
                    Fazer oferta
                    </a>
                </div>
            </div>
        </div>
        <div class="px-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <button type="button" title="Like post" class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                            <path d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z"></path>
                        </svg>
                    </button>
                    <button type="button" title="Share post" class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                            <path d="M474.444,19.857a20.336,20.336,0,0,0-21.592-2.781L33.737,213.8v38.066l176.037,70.414L322.69,496h38.074l120.3-455.4A20.342,20.342,0,0,0,474.444,19.857ZM337.257,459.693,240.2,310.37,389.553,146.788l-23.631-21.576L215.4,290.069,70.257,232.012,443.7,56.72Z"></path>
                        </svg>
                    </button>
                    <div class="flex flex-wrap items-center pt-3 pb-1 cursor-pointer">
                        <div class="flex items-center space-x-2">
                            <div class="flex -space-x-4">
                                <img alt="" class="w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800" src="https://source.unsplash.com/40x40/?portrait?1">
                                <img alt="" class="w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800" src="https://source.unsplash.com/40x40/?portrait?2">
                                <img alt="" class="w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800" src="https://source.unsplash.com/40x40/?portrait?3">
                            </div>
                            <span class="text-sm">6 pessoas
                                <span class="font-semibold">fizeram oferta</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <p class="text-sm text-right">
                    <span class="text-base font-semibold">Publicado à </span>{{ timeCreate($data->created_at) }}
                </p>
            </div>
        </div>
    </div>
@endif


