@props(['data'])
@if ($data)
<div x-data="{ open: false }" class="relative inline-block">
    <!-- Dropdown toggle button -->
    @if ($data->offers->count() == 0)
        <div  class="flex justify-center items-center space-x-3 " >
            <div class="flex flex-wrap items-center pt-3 pb-1 " >
                <div class="flex items-center space-x-2">
                    <span class="text-sm">Nenhuma pessoa
                        <span class="font-semibold">fez oferta</span>
                    </span>
                </div>
            </div>
        </div>
    @else
        <div @click="open = !open" class="flex justify-center items-center space-x-3 cursor-pointer" >
            <div class="flex flex-wrap items-center pt-3 pb-1 cursor-pointer" >
                <div class="flex items-center space-x-2">
                    @php
                        $i = 0;
                    @endphp
                    <div class="flex -space-x-4">
                        @foreach ($data->offers as $offer)
                            @php $i += 1; @endphp
                                <img alt="sistemilhas-avatar-{{$offer->username}}" class="w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800" src="{{( $offer->avatar ? url('storage/profiles/'.$offer->avatar) : url('storage/profiles/avatar.jpg')) }}">
                            @if ($i == 3)
                                @break
                            @endif
                        @endforeach
                    </div>

                    <span class="text-sm">{{($data->offers->count() > 1 ? 'foram feitas':'foi feita')  }}
                        <span class="font-semibold" > {{ $data->offers->count() }} oferta</span>
                    </span>
                </div>
            </div>
        </div>
    @endif

    <!-- Dropdown menu -->
    <div x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="absolute right-0 z-20 w-64 mt-2 overflow-hidden bg-white rounded-md shadow-lg sm:w-80 dark:bg-gray-800"
     >
        <div class="py-2">
            @foreach ($data->offers as $offer)
                <a href="{{ url('oferta/'.$offer->id) }}" class="flex items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                    <img alt="sistemilhas-avatar-{{$offer->user->username}}" class="flex-shrink-0 object-cover w-8 h-8 mx-1 border rounded-full dark:bg-gray-500 dark:border-gray-800" src="{{( $offer->user->avatar ? url('storage/profiles/'.$offer->user->avatar) : url('storage/profiles/avatar.jpg')) }}">
                    <p class="mx-2 text-sm text-gray-600 dark:text-white"><span class="font-bold" href="{{ url('oferta-do-pedido/'.$data->id) }}">{{ '@'.$offer->user->username }}</span> fez oferta de R$ {{ money($offer->value) }}</p>
                </a>
            @endforeach
        </div>
        <a href="{{ url('ofertas-do-pedido/'.$data->id) }}" class="block py-2 font-bold text-center text-white bg-gray-800 dark:bg-gray-700 hover:underline">Ver lista completa</a>
    </div>
</div>

@endif

