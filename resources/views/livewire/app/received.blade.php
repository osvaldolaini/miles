<div class="w-full">
    @if ($demand)
          {{-- MODAL CREATE --}}
        <x-dialog-modal wire:model="showModalReceived" class="mt-0">
            <x-slot name="title" >Recibo</x-slot>
            <x-slot name="content">
                <div class="stats stats-vertical w-full
                bg-white text-gray-900">
                <div class="stat px-1">
                    <div class="stat-title font-bold text-gray-900">Dados do pedido</div>
                    <div class="stat-title text-lg font-extrabold text-gray-800">
                        <div class="stats p-0 m-0 bg-transparent text-gray-900">
                            <div class="stat p-0 px-1">
                                R$ {{ $demand->value }} - R$ {{ $demand->value_max }}
                            </div>
                            <div class="stat p-0 px-1 text-sm justify-end">
                                <h1 class="font-bold mt-0 pt-0 text-gray-900">{{ $demand->milesConvert }} Milhas</h1>
                                <h2 class="font-bold mt-0 pt-0 text-gray-900">{{ $demand->qtd }} CPF</h2>
                                <h2 class="font-bold mt-0 pt-0 text-red-500">{{ $demand->category->title }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="stat-actions">
                            <x-user-card :user="$demand->user" notdetail="true">
                            </x-user-card>
                    </div>
                    <div class="stat-title text-right text-xs mt-5">{{ $demand->code }}</div>
                </div>
                <div class="stat px-1 text-gray-900">
                    <div class="stat-title font-bold">Oferta vencedora</div>
                    <div class="stat-value">R$ {{ $winner->value }}</div>
                    <div class="stat-actions">
                        <x-user-card :user="$winner->user" notdetail="true">
                        </x-user-card>
                    </div>
                    <div class="stat-title text-right text-xs mt-5">{{ $winner->code }}</div>
                </div>
                @if (count($offers) > 0)
                <div class="stat px-1  border-dashed border-s">
                    <div class="stat-title font-bold">Ofertas não selecionadas</div>
                </div>
                @foreach ($offers as $offer)
                    <div class="stat px-1">
                        <div class="stat-value">R$ {{ $offer->value }}</div>
                        <div class="stat-actions">
                            <x-user-card :user="$offer->user" notdetail="true">
                            </x-user-card>
                        </div>
                        <div class="stat-title text-right text-xs mt-5">{{ $offer->code }}</div>
                    </div>
                @endforeach
                @endif

            </div>

            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('showModalReceived')" class="mx-2">
                    Fechar
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif

</div>

