<div>
    @if ($demands->count() == 0)
        Nenhuma demanda
    @endif
    @foreach ($demands as $item)
        <div wire:key="{{ $item }}"
            class="container-fluid rounded-lg shadow-md py-2
                dark:bg-gray-900 mb-4
                bg-gradient-to-r from-zinc-200 from-10% via-zinc-300 via-30% to-teal-500 to-80%">
            <div class="flex items-center justify-between py-0 px-3 ">
                <div>
                    @livewire('app.user-card', ['user' => $item->user], key($item->user->id))
                </div>
                <div class="text-right">
                    <h1 class="text-xl font-bold mt-0 pt-0">{{ $item->milesConvert }} Milhas</h1>
                    <h2 class="text-lg font-bold mt-0 pt-0">{{ $item->qtd }} CPF</h2>
                    <h2 class="text-md font-bold mt-0 pt-0">Valor R$ {{ $item->value }}
                    </h2>
                    @if ($item->user->id == Auth::user()->id)
                        @if ($item->user->cpf != null)
                            <div class="mt-0 pt-0">
                                <button type='button' wire:click="showDeleteModal({{ $item->id }})"
                                    class="bg-red-500
                                            hover:bg-gray-900 border-2 border-red-500
                                            active:bg-red-300 text-white text-xs
                                            font-bold uppercase px-6 py-2.5 rounded-full
                                            shadow hover:shadow-md outline-none focus:outline-none
                                            mr-0 mb-0 ml-3 mx-4  ease-linear transition-all
                                            duration-150">
                                    Excluir <span class="fa-solid fa-trash"></span>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="mt-2">
                            @livewire('app.offer', ['demand' => $item], key($item->id))
                        </div>
                    @endif
                </div>
            </div>
            <div class="px-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center ">
                        @if ($item->user->id != Auth::user()->id)
                            @livewire('app.demand-likes', ['demands' => $item], key($item->id))
                        @endif
                        <button type="button" title="Compartilhar" class="mx-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current">
                                <path
                                    d="M474.444,19.857a20.336,20.336,0,0,0-21.592-2.781L33.737,213.8v38.066l176.037,70.414L322.69,496h38.074l120.3-455.4A20.342,20.342,0,0,0,474.444,19.857ZM337.257,459.693,240.2,310.37,389.553,146.788l-23.631-21.576L215.4,290.069,70.257,232.012,443.7,56.72Z">
                                </path>
                            </svg>
                        </button>
                        {{-- dropdown ofertas --}}
                        @livewire('app.offers-to-demand', ['demand' => $item, 'linkOffer' => false], key($item->id))
                    </div>
                </div>

                <div class="space-y-3">
                    <p class="flex text-xs justify-end">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.06152 12C5.55362 8.05369 8.92001 5 12.9996 5C17.4179 5 20.9996 8.58172 20.9996 13C20.9996 17.4183 17.4179 21 12.9996 21H8M13 13V9M11 3H15M3 15H8M5 18H10"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="text-base font-semibold text-xs mr-1">
                            Publicado à
                        </span> {{ $item->timeCreate }}
                    </p>
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
