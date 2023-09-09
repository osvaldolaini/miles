<div>
    @livewire('app.message-alert')
    @livewire('app.received')
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    @foreach ($offers as $item)
        {{-- <div class="py-2" @if ($loop->last) id="last_record" @endif> --}}
        <div class="py-2">
            <div
                class="stats stats-vertical lg:stats-horizontal w-full
                bg-teal-500 text-white dark:bg-teal-500">
                <div class="stat px-2">
                    <div class="stat-title font-bold text-white">Dados do pedido</div>
                    <div class="stat-title text-lg font-extrabold text-white">
                        R$ {{ $item->demand->value }} - R$ {{ $item->demand->value_max }}
                    </div>
                    <div class="stat-actions">
                        <div class="stats p-0 m-0 bg-transparent">
                            <div class="stat p-0 px-2">
                                <x-user-card :user="$item->demand->user">
                                </x-user-card>
                            </div>
                            <div class="stat p-0 px-2 text-sm justify-end text-white">
                                <h1 class="font-bold mt-0 pt-0">{{ $item->demand->milesDemand }} Milhas</h1>
                                <h2 class="font-bold mt-0 pt-0">{{ $item->demand->qtd }} CPF</h2>
                                <h2 class="font-bold mt-0 pt-0 text-red-500">{{ $item->demand->category->title }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat px-2">
                    <div class="stat-title font-bold text-white">Minha oferta</div>
                    <div class="stat-value text-white">R$ {{ $item->value }}</div>
                    <div class="stat-actions">
                        @if ($item->demand->offer_id == $item->id)
                            @if ($item->demand->status >= 2 && $item->status == 1)
                                <button wire:click="showModalUpdate({{ $item->id }})"
                                    wire:key="item-{{ $item->id }}"
                                    class="flex
                                    border-2 border-teal-500 bg-gray-900 text-white
                                    hover:bg-teal-500 active:bg-teal-300 active:text-white
                                    text-xs font-bold uppercase px-6 py-2.5 rounded-full
                                    shadow hover:shadow-md outline-none focus:outline-none
                                    lg:mr-1 lg:mb-0 ml-1 mb-4 ease-linear transition-all duration-150">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" focusable="false" aria-hidden="true"
                                        viewBox="0 -64 640 640" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z" />
                                    </svg>
                                    Finalizar
                                </button>
                            @else
                                @if ($item->status == 2)
                                    {{-- Rating --}}
                                    @livewire('app.rating-users', ['demands' => $item->demand, 'rated' => $item->demand->user_id], key($item->demand->id))
                                @else
                                    <div class="flex mt-0 pt-0">
                                        <span
                                            class="
                                        bg-green-500
                                        hover:bg-gray-900 border-2 border-green-900
                                        active:bg-green-300 text-white text-xs font-bold
                                        uppercase px-6 py-2.5 rounded-full
                                        shadow hover:shadow-md
                                        outline-none focus:outline-none ml-3 mb-4
                                        ease-linear transition-all duration-150">
                                            Finalizado
                                        </span>
                                        <button type='button' wire:click="openReceived({{ $item->demand->id }})"
                                            class="bg-gray-500 cursor-pointer
                                                hover:bg-gray-900 border-2 border-gray-500
                                                active:bg-gray-300 text-white text-xs
                                                font-bold uppercase px-6 py-2.5 rounded-full
                                                shadow hover:shadow-md outline-none focus:outline-none
                                                ml-3 mb-4 ease-linear transition-all
                                                duration-150">
                                            Detalhes
                                        </button>

                                    </div>
                                @endif
                            @endif
                        @else
                            @if ($item->demand->status >= 2)
                                <span
                                    class="
                                        bg-red-500
                                        hover:bg-gray-900 border-2 border-gray-900
                                        active:bg-red-300 text-white text-xs font-bold
                                        uppercase px-6 py-2.5 rounded-full
                                        shadow hover:shadow-md
                                        outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4
                                        ease-linear transition-all duration-150">
                                    Não selecionada
                                </span>
                            @elseif ($item->demand->status == 0)
                            <span
                                    class="
                                        bg-red-500
                                        hover:bg-gray-900 border-2 border-gray-900
                                        active:bg-red-300 text-white text-xs font-bold
                                        uppercase px-6 py-2.5 rounded-full
                                        shadow hover:shadow-md
                                        outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4
                                        ease-linear transition-all duration-150">
                                    Pedido excluído
                                </span>
                            @elseif ($item->end_date > date('Y-m-d H:i:s') && $item->demand->status == 1)
                                <span
                                    class="
                                        bg-red-500
                                        hover:bg-gray-900 border-2 border-gray-900
                                        active:bg-red-300 text-white text-xs font-bold
                                        uppercase px-6 py-2.5 rounded-full
                                        shadow hover:shadow-md
                                        outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4
                                        ease-linear transition-all duration-150">
                                    Não selecionada
                                </span>
                            @else
                                <span
                                    class="
                                        bg-blue-500
                                        hover:bg-gray-900 border-2 border-blue-900
                                        active:bg-blue-300 text-white text-xs font-bold
                                        uppercase px-6 py-2.5 rounded-full
                                        shadow hover:shadow-md
                                        outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-4
                                        ease-linear transition-all duration-150">

                                    Aguardando Seleção {{ $item->demand->status }}
                                </span>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if ($takeLimit >= $totalRecords)
        <p class="text-gray-800 font-bold text-2xl text-center my-10">...</p>
    @endif
    {{-- MODAL UPDATE --}}
    <x-dialog-modal wire:model="showModalUpdate" class="mt-0">
        <x-slot name="title">Finalizar</x-slot>
        <x-slot name="content">
            @if ($this->passengers)
                @php
                    $c = 0;
                @endphp
                @foreach ($passengers as $item)
                    @if ($item->cpf != '')
                        @php
                            $c += 1;
                        @endphp
                    @endif
                @endforeach
                @if ($c == 0)
                <h2 class="text-red-500">
                    *Passageiro(s) não informado(s) pelo comprador.
                </h2>
                @else
                <h2 class="text-red-500">
                    *O(s) passageiro(s)
                    @foreach ($passengers as $item)
                        {{ $item->name }},
                    @endforeach
                    informados pelo comprador ficará(ão) vinculado(s) a conta selecionada.
                </h2>
                <h2 class="text-red-500">
                    É possivel verificar na lista de contas.
                </h2>
                @endif

            @endif
            <form action="#" wire:submit.prevent="update()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-1 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="account_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Conta
                        </label>
                        <select wire:model="account_id" name="account_id" id="account_id" placeholder="Conta"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @if ($accounts)
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}
                                        ({{ $account->category->title }})
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('account_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit"
                        class="bg-teal-500
                        hover:bg-gray-900 border-2 border-teal-500
                        active:bg-teal-300 text-white text-xs
                        font-bold uppercase px-6 py-2.5 rounded-full
                        shadow hover:shadow-md outline-none focus:outline-none
                        mr-0 lg:mb-0 ml-3 mx-4  ease-linear transition-all
                        duration-150">
                        Finalizar
                    </button>
                </div>
            </form>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalUpdate')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    {{-- <script>
        const lastRecord = document.getElementById('last_record');
        const options = {
            root: null,
            threshold: 1,
            rootMargin: '0px'
        }
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    @this.takeMore()
                }
            });
        });
        observer.observe(lastRecord);
    </script> --}}
</div>
