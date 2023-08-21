<div>
    @livewire('app.message-alert')

    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    <div class="py-2">
        @if ($demands)
            @foreach ($demands as $item)
                <div wire:key="{{ $item }}"
                    class="container-fluid rounded-lg shadow-md py-2
                     mb-4 bg-teal-500 text-white">
                    <div class="flex items-center justify-between py-0 px-3 ">
                        <div>
                            <x-user-card :user="$item->user">
                            </x-user-card>
                        </div>
                        <div class="text-right">
                            <h1 class="text-xl font-bold mt-0 pt-0">{{ $item->milesDemand }} Milhas</h1>

                            <h2 class="text-lg font-bold mt-0 pt-0 flex">
                                @if ($item->reUse($item->account_categorie_id) != 0)
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
                                        @if ($item->reUse($item->account_categorie_id)['qtd'] > 1)
                                            {{ $item->reUse($item->account_categorie_id)['qtd'] }}
                                            CPF dessa oferta já foram utilizados na carteira
                                            {{ $item->category->title }}:
                                            <ul>
                                                @foreach ($item->reUse($item->account_categorie_id)['cpfs'] as $cpf)
                                                <li> - &nbsp;
                                                    {{ $cpf }}
                                                </li>
                                                @endforeach

                                            </ul>
                                        @else
                                            {{ $item->reUse($item->account_categorie_id)['qtd'] }}
                                            CPF dessa oferta já foi utilizado  na carteira
                                            {{ $item->category->title }}:
                                            <ul>
                                                @foreach ($item->reUse($item->account_categorie_id)['cpfs'] as $cpf)
                                                <li> - &nbsp;
                                                    {{ $cpf }}
                                                </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        </ul>
                                    </div>
                                @endif

                                {{ $item->qtd }} CPF
                            </h2>
                            <h2 class="text-md font-bold mt-0 pt-0">Valor R$ {{ $item->value }}</h2>
                            <h2 class="text-md font-bold mt-0 pt-0 text-red-500">{{ $item->category->title }}</h2>

                            <div class="mt-2">
                                @livewire('app.offer', ['demand' => $item], key($item->id))
                            </div>
                        </div>
                    </div>

                    <div class="px-3">
                        <div class="flex items-center sm:justify-between">
                            <div class="flex items-center ">
                                @livewire('app.demand-likes', ['demands' => $item], key($item->id))
                                @livewire('app.offers-to-demand', ['demand' => $item, 'linkOffer' => false], key($item->id))
                            </div>
                        </div>

                        <div class="space-y-3">
                            <p class="flex text-xs justify-end">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
            @endforeach
        @endif

    </div>
</div>
