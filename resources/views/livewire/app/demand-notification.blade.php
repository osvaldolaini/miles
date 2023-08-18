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
                    <h2 class="text-lg font-bold mt-0 pt-0">{{ $item->qtd }} CPF</h2>
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
    @endforeach
        @endif

    </div>
</div>
