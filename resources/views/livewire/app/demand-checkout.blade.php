<div>
    <div class="stats stats-vertical lg:stats-horizontal w-full">
        <div class="stat">
            <div class="stat-actions">
                @if ($demand->status == 1)
                    <button wire:click="showCheckoutModel()"
                    {{ ($btn == 1 ? 'disabled="disabled"':"") }}
                            class="btn btn-info btn-sm">
                        <svg class="w-5 h-5" fill="currentColor" focusable="false" aria-hidden="true" viewBox="0 -64 640 640"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z" />
                        </svg>
                        Finalizar
                    </button>
                    <a class="btn btn-success btn-sm" href="{{ route('offer.user', [$offer->code]) }}">
                        <svg class="w-5 h-5" fill="currentColor" focusable="false" aria-hidden="true"
                            viewBox="0 0 24 24" data-testid="QuestionAnswerIcon">
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z">
                            </path>
                        </svg>
                        Conversar
                    </a>
                @else
                    @if ($demand->status == 2)
                        <h2 class="text-xl">
                            <span class="badge badge-lg">Finalizado</span>
                        </h2>
                        {{-- Rating --}}
                        @livewire('app.rating-users', ['demands' => $demand, 'rated' => $offer->user_id], key($demand->id))
                    @endif
                @endif
            </div>
        </div>
        <div class="stat">
            @if($btn == 1)
                <div class="stat-title text-red-500 font-extrabold">
                    Preencher todo os passageiros
                </div>
                <div class="stat-title text-red-500 font-extrabold">
                    para librerar o botão de finalizar.
                </div>
            @endif
        </div>
    </div>
    <div class="pb-2">
        <div
            class="stats stats-vertical lg:stats-horizontal w-full
            bg-gradient-to-r from-zinc-200 from-10% via-zinc-300 via-30% to-teal-500 to-80%">
            <div class="stat">
                <div class="stat-title font-bold">Dados do pedido</div>
                <div class="stat-title text-lg font-extrabold">
                    R$ {{ $demand->value }} - R$ {{ $demand->value_max }}
                </div>
                <div class="stat-actions">
                    <h1 class="font-bold mt-0 pt-0">{{ $demand->milesConvert }} Milhas</h1>
                    <h2 class="font-bold mt-0 pt-0">{{ $demand->qtd }} CPF</h2>
                    <h2 class="font-bold mt-0 pt-0 text-red-500">{{ $demand->category->title }}</h2>
                </div>
            </div>
            <div class="stat">
                <div class="stat-title font-bold">Dados da oferta</div>
                <div class="stat-value">
                    R$ {{ $offer->value }}
                </div>
                <div class="stat-title font-bold">Ordem na fila: {{ $offer->order }}º</div>
                <div class="stat-actions">
                    @livewire('app.user-card', ['user' => $offer->user], key($offer->user->id))
                </div>
            </div>
        </div>
    </div>

    <div class="py-2 w-full">
        <div
            class="w-full
                ">
                <div class="stats stats-vertical py-0 w-full
                bg-gradient-to-r from-zinc-200 from-10% via-zinc-300 via-30% to-teal-500 to-80%">
                    <div class="stat py-1">
                        <div class="stat-title text-lg font-extrabold">
                            Passageiros
                        </div>
                    </div>
                    @foreach ($demand->passengers as $passenger)
                        @livewire('app.favorite-passenger', ['passenger' => $passenger], key($passenger->id))
                    @endforeach
                </div>

        </div>
    </div>
    {{-- MODAL DELETE --}}
    <x-confirmation-modal wire:model="showCheckoutModel">
        <x-slot name="title">Finalizar</x-slot>
        <x-slot name="content">
            <h2 class="h2">Deseja realmente finalizar o pedido?</h2>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showCheckoutModel')" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click.prevent="checkout()" wire.loading.attr='disable'>
                Finalizar
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
