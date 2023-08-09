<div>
    @livewire('app.message-alert')
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    @foreach ($offers as $item)
        <div class="py-2" wire:key="{{ $item->id }}">
            <div
                class="stats stats-vertical lg:stats-horizontal w-full
                bg-gradient-to-r from-zinc-200 from-10% via-zinc-300 via-30% to-teal-500 to-80%">
                <div class="stat">
                    <div class="stat-title font-bold">Dados do pedido</div>
                    <div class="stat-title text-lg font-extrabold">
                        R$ {{ $chat->demand->value }} - R$ {{ $chat->demand->value_max }}
                    </div>
                    <div class="stat-actions">
                        <div class="stats p-0 m-0 bg-transparent">
                            <div class="stat p-0 px-2">
                                @livewire('app.user-card', ['user' => $item->demand->user], key($item->demand->user->id))
                            </div>
                            <div class="stat p-0 px-2 text-sm justify-end">
                                <h1 class="font-bold mt-0 pt-0">{{ $item->demand->milesConvert }} Milhas</h1>
                                <h2 class="font-bold mt-0 pt-0">{{ $item->demand->qtd }} CPF</h2>
                                <h2 class="font-bold mt-0 pt-0 text-red-500">{{ $item->demand->category->title }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title font-bold">Minha oferta</div>
                    <div class="stat-value">R$ {{ $item->value }}</div>
                    <div class="stat-actions">
                        @if ($item->status == 2)
                        <button class="
                            border-2 border-teal-500 bg-gray-900 text-white
                            hover:bg-teal-500 active:bg-teal-300 active:text-white
                            text-xs font-bold uppercase px-6 py-2.5 rounded-full
                            shadow hover:shadow-md outline-none focus:outline-none
                            lg:mr-1 lg:mb-0 ml-1 mb-4 ease-linear transition-all duration-150">
                            Finalizar
                        </button>
                        <button class="border-2 border-teal-500 bg-gray-900 text-white
                                hover:bg-teal-500 active:bg-teal-300 active:text-white
                                text-xs font-bold uppercase px-6 py-2.5 rounded-full
                                shadow hover:shadow-md outline-none focus:outline-none
                                lg:mr-1 lg:mb-0 ml-1 mb-4 ease-linear transition-all duration-150">
                                Avaliar
                        </button>
                        @else
                            <h2 class="text-xl">
                                <span class="badge badge-lg">Não selecionada</span>
                            </h2>
                        @endif

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
