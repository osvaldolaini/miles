<div>
    @foreach ($data as $item)
        @if ($item->demand->end_date >= date('Y-m-d H:i:s') && $item->demand->status == 1)
            <div
                class="container-fluid rounded-lg shadow-md py-2
                bg-gray-100 dark:bg-gray-900 dark:text-gray-100 mx-2 mb-4">
                <div class="flex items-center justify-between py-0 px-3 ">
                    <div >
                        @livewire('app.user-card', ['user' => $item->demand->user], key($item->user->id))
                    </div>
                    <div class="text-right">
                        <h1 class="text-xl font-bold mt-0 pt-0">{{ $item->demand->milesConvert }} Milhas</h1>
                        <h2 class="text-lg font-bold mt-0 pt-0">{{ $item->demand->qtd }} CPF</h2>
                        <h2 class="text-md font-bold mt-0 pt-0">Valor R$ {{ $item->demand->value }}
                        </h2>
                        @if ($item->demand->user->id == Auth::user()->id)
                            @if ($item->demand->user->cpf != null)
                                <div class="mt-0 pt-0">
                                    <button type='button' wire:click="showDeleteModal({{ $item->demand->id }})"
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
                                @livewire('app.offer', ['demand' => $item->demand], key($item->demand->id))
                            </div>
                        @endif
                    </div>
                </div>
                <div class="px-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center ">
                            @if ($item->demand->user->id != Auth::user()->id)
                                @livewire('app.demand-likes', ['demands' => $item->demand], key($item->demand->id))
                            @endif
                            <button type="button" title="Compartilhar" class="mx-1 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-5 h-5 fill-current">
                                    <path
                                        d="M474.444,19.857a20.336,20.336,0,0,0-21.592-2.781L33.737,213.8v38.066l176.037,70.414L322.69,496h38.074l120.3-455.4A20.342,20.342,0,0,0,474.444,19.857ZM337.257,459.693,240.2,310.37,389.553,146.788l-23.631-21.576L215.4,290.069,70.257,232.012,443.7,56.72Z">
                                    </path>
                                </svg>
                            </button>
                            {{-- dropdown ofertas --}}
                            @livewire('app.offers-to-demand', ['demand' => $item->demand,'linkOffer'=>false], key($item->demand->id))
                        </div>
                    </div>

                    <div class="space-y-3">
                        <p class="flex text-xs justify-end">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.06152 12C5.55362 8.05369 8.92001 5 12.9996 5C17.4179 5 20.9996 8.58172 20.9996 13C20.9996 17.4183 17.4179 21 12.9996 21H8M13 13V9M11 3H15M3 15H8M5 18H10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-base font-semibold text-xs mr-1">
                                Publicado à
                            </span> {{ $item->demand->timeCreate }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

