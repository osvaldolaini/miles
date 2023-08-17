<div>
    @section('page-title')
    {{ $dataPage['title'] }}
    @endsection
    <div >
        <div
            class="relative  rounded-lg shadow-md py-2
            dark:bg-gray-900  mb-4
            bg-teal-500 text-white">
            @if ($demand->status == 0)
                <div class="absolute overflow-hidden h-full w-1/2 -mt-2">
                    <div class="absolute left-0 top-0 h-16 w-16">
                        <div
                            class="absolute transform -rotate-45 bg-red-600
                            text-center text-white font-semibold
                            py-1 left-[-34px] top-[32px] w-[170px]">
                            Excluido
                        </div>
                    </div>
                </div>
            @endif
            @if ($demand->end_date < date('Y-m-d H:i:s') && $demand->status == 1)
                <div class="absolute overflow-hidden h-full w-1/2 -mt-2">
                    <div class="absolute left-0 top-0 h-16 w-16">
                        <div
                            class="absolute transform -rotate-45 bg-gray-600 text-center text-white font-semibold py-1 left-[-34px] top-[32px] w-[170px]">
                            Expirado
                        </div>
                    </div>
                </div>
            @endif
            @if ($demand->status == 2)
                <div class="absolute overflow-hidden h-full w-1/2 -mt-2">
                    <div class="absolute left-0 top-0 h-16 w-16">
                        <div
                            class="absolute transform -rotate-45 bg-yellow-600
                                text-center text-white font-semibold
                                py-1 left-[-34px] top-[32px] w-[170px]">
                            Avaliar
                        </div>
                    </div>
                </div>
            @endif
            @if ($demand->status == 3)
                <div class="absolute overflow-hidden h-full w-1/2 -mt-2">
                    <div class="absolute left-0 top-0 h-16 w-16">
                        <div
                            class="absolute transform -rotate-45 bg-green-600
                                text-center text-white font-semibold
                                py-1 left-[-34px] top-[32px] w-[170px]">
                            Finalizado
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex demands-center justify-between py-0 px-3" wire:key="{{ $demand->id }}">
                <div class="flex demands-center space-x-2">
                    @if ($demand->end_date > date('Y-m-d H:i:s') && $demand->status == 1)
                        <div class="flex">
                            @livewire('app.social-share', ['demand' => $demand], key($demand->id))
                        </div>
                    @endif
                </div>
                <div class="text-right">
                    <h1 class="text-xl font-bold mt-0 pt-0">{{ $demand->milesConvert }} Milhas</h1>
                    <h2 class="text-lg font-bold mt-0 pt-0">{{ $demand->qtd }} CPF</h2>
                    <h2 class="text-md font-bold mt-0 pt-0">Valor R$ {{ $demand->value }}</h2>
                    <h2 class="text-md font-bold mt-0 pt-0 text-red-500">{{ $demand->category->title }}</h2>

                    @if ($demand->status == 3)
                        <div class="mt-0 pt-0">
                            <span
                                class="bg-gray-500
                                hover:bg-gray-900 border-2 border-gray-500
                                active:bg-gray-300 text-white text-xs
                                font-bold uppercase px-6 py-2 rounded-full
                                shadow hover:shadow-md outline-none focus:outline-none
                                mr-0 mb-0 ml-2 m2-4 ease-linear transition-all
                                duration-150">
                                Ops... Finalizado
                            </span>
                        </div>
                    @endif

                </div>
            </div>
            <div class="px-3">
                <div class="flex demands-center justify-between">
                    @if ($demand->end_date > date('Y-m-d H:i:s') && $demand->status == 1)
                        <div class="flex flex-col demands-center ">
                            <div class="flex">
                                @livewire('app.offers-to-demand', ['demand' => $demand, 'linkOffer' => true], key($demand->id))
                            </div>
                        </div>
                    @else
                        <div class="flex demands-center space-x-2">
                            @if ($demand->status != 0)
                                <div>
                                    <x-user-card :user="$demand->user">
                                    </x-user-card>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="space-y-3 pr-2">
                    <p class="flex text-xs justify-end">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.06152 12C5.55362 8.05369 8.92001 5 12.9996 5C17.4179 5 20.9996 8.58172 20.9996 13C20.9996 17.4183 17.4179 21 12.9996 21H8M13 13V9M11 3H15M3 15H8M5 18H10"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="text-base font-semibold text-xs mr-1">
                            Publicado à
                        </span> {{ $demand->timeCreate }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
