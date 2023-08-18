<div>
    @livewire('app.message-alert')
    @livewire('app.received')
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    @foreach ($demands as $item)
        <div wire:key="{{ $item->id }}">
            <div
                class="relative  rounded-lg shadow-md py-2 mt-2
                 mb-4 bg-teal-500 text-white">
                @if ($item->status == 0)
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
                @if ($item->end_date < date('Y-m-d H:i:s') && $item->status == 1)
                    <div class="absolute overflow-hidden h-full w-1/2 -mt-2">
                        <div class="absolute left-0 top-0 h-16 w-16">
                            <div
                                class="absolute transform -rotate-45 bg-gray-600 text-center text-white font-semibold py-1 left-[-34px] top-[32px] w-[170px]">
                                Expirado
                            </div>
                        </div>
                    </div>
                @endif
                @if ($item->status == 2)
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
                @if ($item->status == 3)
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

                <div class="flex items-center justify-between py-0 px-3" wire:key="{{ $item->id }}">
                    <div class="flex items-center space-x-2">
                        @if ($item->end_date > date('Y-m-d H:i:s') && $item->status == 1)
                            <div class="flex">
                                <x-share :demand="$item"></x-share>
                                {{-- @livewire('app.social-share', ['demand' => $item], key($item->id)) --}}
                            </div>
                        @endif
                    </div>
                    <div class="text-right">
                        <h1 class="text-xl font-bold mt-0 pt-0">{{ $item->milesDemand }} Milhas</h1>
                        <h2 class="text-lg font-bold mt-0 pt-0">{{ $item->qtd }} CPF</h2>
                        <h2 class="text-md font-bold mt-0 pt-0">Valor R$ {{ $item->value }}</h2>
                        <h2 class="text-md font-bold mt-0 pt-0 text-red-500">{{ $item->category->title }}</h2>
                        @if ($item->end_date > date('Y-m-d H:i:s') && $item->status == 1)
                            <div class="mt-0 pt-0">
                                <button type='button' wire:click="showDeleteModal({{ $item->id }})"
                                    class="bg-red-500 cursor-pointer
                                    hover:bg-gray-900 border-2 border-red-500
                                    active:bg-red-300 text-white text-xs
                                    font-bold uppercase px-6 py-2.5 rounded-full
                                    shadow hover:shadow-md outline-none focus:outline-none
                                    mr-0 mb-0 ml-3 mx-4 ease-linear transition-all
                                    duration-150">
                                    Excluir <span class="fa-solid fa-trash"></span>
                                </button>
                            </div>
                        @endif
                        @if ($item->status == 2)
                            {{-- Rating --}}
                            @livewire('app.rating-users', ['demands' => $item, 'rated' => $item->offer->user_id], key($item->id))
                        @endif
                        @if ($item->status == 3)
                            <div class="mt-0 pt-0">
                                <button type='button' wire:click="openReceived({{ $item->id }})"
                                    class="bg-gray-500 cursor-pointer
                                    hover:bg-gray-900 border-2 border-gray-500
                                    active:bg-gray-300 text-white text-xs
                                    font-bold uppercase px-6 py-2 rounded-full
                                    shadow hover:shadow-md outline-none focus:outline-none
                                    mr-0 mb-0 ml-2 m2-4 ease-linear transition-all
                                    duration-150">
                                    Detalhes
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="px-3">
                    <div class="flex items-center justify-between">
                        @if ($item->end_date > date('Y-m-d H:i:s') && $item->status == 1)
                            <div class="flex flex-col items-center ">
                                <div class="flex">
                                    {{-- <button type="button" title="Compartilhar" class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-5 h-5 fill-current">
                                        <path
                                            d="M474.444,19.857a20.336,20.336,0,0,0-21.592-2.781L33.737,213.8v38.066l176.037,70.414L322.69,496h38.074l120.3-455.4A20.342,20.342,0,0,0,474.444,19.857ZM337.257,459.693,240.2,310.37,389.553,146.788l-23.631-21.576L215.4,290.069,70.257,232.012,443.7,56.72Z">
                                        </path>
                                    </svg>
                                </button> --}}
                                    {{-- dropdown ofertas --}}
                                    @livewire('app.offers-to-demand', ['demand' => $item, 'linkOffer' => true], key($item->id))
                                </div>
                            </div>
                        @else
                            <div class="flex items-center space-x-2">
                                @if ($item->status != 0)
                                    <div>
                                        <x-user-card :user="$item->user">
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
                            </span> {{ $item->timeCreate }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- MODAL DELETE --}}
    <x-confirmation-modal wire:model="showDeleteModal">
        <x-slot name="title">Excluir pedido</x-slot>
        <x-slot name="content">
            <h2 class="h2">Deseja realmente excluir o pedido?</h2>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showDeleteModal')" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click.prevent="delete()" wire.loading.attr='disable'>
                Excluir
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

</div>
