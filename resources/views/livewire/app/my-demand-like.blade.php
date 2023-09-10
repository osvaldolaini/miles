<div>
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    @foreach ($data as $item)
        @if ($item->demand->end_date >= date('Y-m-d H:i:s') && $item->demand->status == 1)
        <div wire:key="demand_{{ $item->id }}"

            class="container-fluid rounded-lg shadow-md py-2
                mb-4 bg-teal-500 text-white mt-2">
            <div class="flex items-center justify-between py-0 px-3 ">
                    <div >
                        <x-user-card :user="$item->demand->user">
                        </x-user-card>
                    </div>
                    <div class="text-right">
                        <h1 class="text-xl font-bold mt-0 pt-0">{{ $item->demand->milesDemand }} Milhas</h1>
                        <h2 class="text-lg font-bold mt-0 pt-0">
                            @if ($item->demand->reUse($item->demand->account_categorie_id) != 0)
                                @if ($item->demand->reUse($item->demand->account_categorie_id)['qtd'] != 0)
                                    <div class="dropdown dropdown-bottom dropdown-end">
                                        <label tabindex="0">
                                            <div class="cursor-pointer container-fluid mr-3">
                                                <div
                                                    class="inline-flex flex-row items-center sm:border
                                                sm:border-gray-700 gap-2 h-6 p-1 bg-transparent
                                                rounded-[30px] text-sm tracking-[.00714em] text-gray-700">
                                                    <svg class="w-6 h-6 sm:w-4 sm:h-4" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none">
                                                        <path fill="currentColor" fill-rule="evenodd"
                                                            d="M10 3a7 7 0 100 14 7 7 0 000-14zm-9 7a9 9 0 1118 0 9 9 0 01-18 0zm8-4a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm.01 8a1 1 0 102 0V9a1 1 0 10-2 0v5z" />
                                                    </svg>
                                                    <span class="hidden sm:block">Detalhes</span>
                                                </div>
                                            </div>
                                        </label>
                                        <ul tabindex="0"
                                            class="dropdown-content z-[1] menu p-2 text-left
                                    shadow bg-white rounded-box w-52 text-gray-900">
                                            @if ($item->demand->reUse($item->demand->account_categorie_id)['qtd'] > 1)
                                                {{ $item->demand->reUse($item->demand->account_categorie_id)['qtd'] }}
                                                CPF dessa oferta já foram utilizados na carteira
                                                {{ $item->demand->account->name }}:
                                                <ul>
                                                    @foreach ($item->demand->reUse($item->demand->account_categorie_id)['cpfs'] as $cpf)
                                                        <li> - &nbsp;
                                                            {{ $cpf }}
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            @else
                                                {{ $item->demand->reUse($item->demand->account_categorie_id)['qtd'] }}
                                                CPF dessa oferta já foi utilizado na carteira
                                                {{ $item->demand->account->name }}:
                                                <ul>
                                                    @foreach ($item->demand->reUse($item->demand->account_categorie_id)['cpfs'] as $cpf)
                                                        <li> - &nbsp;
                                                            {{ $cpf }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                        </ul>
                                    </div>
                                @endif
                            @endif
                            {{ $item->demand->qtd }} CPF
                        </h2>
                        <h2 class="text-md font-bold mt-0 pt-0">Valor R$ {{ $item->demand->value }}</h2>
                        <h2 class="text-md font-bold mt-0 pt-0 text-red-500">{{ $item->demand->category->title }}</h2>
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

