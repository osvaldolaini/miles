<div>
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    <div class="container-fluid rounded-lg shadow-md py-2
            dark:bg-gray-900 bg-gray-200 my-3">

        <div class="p-6 grid grid-cols-3 gap-3 col-span-full lg:col-span-4">
            <div
                class="container-fluid rounded-lg shadow-md py-2
                dark:bg-gray-900 mb-4 col-span-full
                bg-gradient-to-r from-zinc-200 from-10% via-zinc-300 via-30% to-teal-500 to-80%">
                <div class="flex items-center justify-between py-0 px-3 ">
                    <div>
                        @livewire('app.user-card', ['user' => $user], key($user->id))
                    </div>
                    <div class="text-right">
                        <h1 class="text-xl font-bold mt-0 pt-0">{{ $miles }} Milhas</h1>
                        <h2 class="text-lg font-bold mt-0 pt-0">{{ $qtd }} CPF</h2>
                        <h2 class="text-md font-bold mt-0 pt-0">Valor R$ {{ $value }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-span-full sm:col-span-2 content-end hidden sm:block">
                <label for="name" class="text-sm">
                    Passageiro
                </label>
            </div>
            <div class="flex flex-row space-x-1 col-span-full sm:col-span-1 text-center hidden sm:block">
                <label for="cpf" class="text-sm ">
                    CPF
                </label>
            </div>
        </div>
        <form action="#" wire:submit.prevent="showModalCreate()" wire.loading.attr='disable'>
            @for ($i = 0; $i < $qtd; $i++)
                <fieldset class="grid grid-cols-4 px-6 py-2 rounded-md  dark:bg-gray-800">
                    <div class="grid grid-cols-3 gap-3 col-span-full lg:col-span-4 content-around">
                        <div class="col-span-full sm:col-span-2 my-auto">
                            <label for="name" class="text-sm block sm:hidden">
                                Passageiro ({{ $i + 1 }})
                            </label>
                            <input wire:model="name.{{ $i }}"  type="text"
                                placeholder="Passageiro"
                                class="w-full rounded-md focus:ring
                                focus:ring-opacity-75 focus:ring-violet-400
                                dark:border-gray-700 dark:text-gray-800">
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex space-x-1 col-span-full sm:col-span-1 content-around">
                            <div class="my-auto" x-data x-init="Inputmask({
                                'mask': '999.999.999-99'
                            }).mask($refs.cpf)">
                                <label for="cpf" class="text-sm block sm:hidden">
                                    CPF {{ count($user->passengers) }}
                                </label>
                                <input wire:model="cpf.{{ $i }}" x-ref="cpf"  placeholder="CPF"
                                    class="w-full rounded-md focus:ring
                                focus:ring-opacity-75 focus:ring-violet-400
                                dark:border-gray-700 dark:text-gray-800">
                                @error('cpf')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (count($user->passengers) < 0)
                                <div>
                                    {{-- favorites --}}
                                    @livewire('app.favorite-passenger', ['user' => $user], key($user->id))
                                </div>
                            @endif
                        </div>
                    </div>
                </fieldset>
            @endfor
        <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md  dark:bg-gray-800">
            <div class="grid col-span-full lg:col-span-4 justify-end">
                <button type="submit"
                    class="bg-teal-500
                    hover:bg-gray-900 border-2 border-teal-500
                    active:bg-teal-300 text-white text-xs
                    font-bold uppercase px-6 py-2.5 rounded-full
                    shadow hover:shadow-md outline-none focus:outline-none
                    mr-0 lg:mb-0 ml-3 mx-4  ease-linear transition-all
                    duration-150">
                    Enviar
                </button>
            </div>
        </fieldset>
    </form>
    </div>
     {{-- MODAL CREATE --}}
     <x-confirmation-modal wire:model="showModalCreate">
        <x-slot name="title">Inserir pedido</x-slot>
        <x-slot name="content">
            <h2 class="h2">Deseja realmente inserir o pedido?</h2>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalCreate')" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click.prevent="store()" wire.loading.attr='disable'>
                Inserir
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
