<div>
    <div class="relative flex justify-center">
        <button wire:click="showModalCreate({{ $demand->id }})"
            class="border-2 border-teal-500 bg-gray-900 text-white
            hover:bg-teal-500 active:bg-teal-300 active:text-white
            text-xs font-bold uppercase px-6 py-2.5 rounded-full
            shadow hover:shadow-md outline-none focus:outline-none
            lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all
            duration-150" >
            FAZER OFERTA
        </button>
    </div>
     {{-- MODAL CREATE --}}
     <x-dialog-modal wire:model="showModalCreate" class="mt-0">
        <x-slot name="title" >Fazer oferta</x-slot>
        <x-slot name="content">
            <p class="my-4 text-sm text-gray-500 dark:text-gray-400">
                *Após fazer a sua oferta você irá entrar na fila por order de valor e chegada respectivamente.
            </p>
            <span>Oferta (R$) </span>
            <label class="flex text-sm text-gray-700 dark:text-gray-200" for="share link">

                <span class="items-center leading-none ml-2
                    justify-center rounded-md bg-red-100
                    px-2.5 py-1 text-red-700">
                    <p class="whitespace-nowrap text-sm">Valor mín: {{ $demand->value }}</p>
                </span>
                <span class="items-center leading-none ml-2
                    justify-center rounded-md bg-red-100
                    px-2.5 py-1 text-red-700">
                    <p class="whitespace-nowrap text-sm">Valor máx: {{ $demand->value_max }}</p>
                </span>
            </label>
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-1 sm:gap-6 sm:mb-5">
                    <div class="col-span-1" x-data x-init="Inputmask({
                        'mask': '99,90'
                    }).mask($refs.value)">
                        <label for="value" class="text-sm">
                            Valor
                        </label>
                        <input x-ref="value" wire:model="value" required type="text" maxlength="7" placeholder="Valor"
                            class="w-full rounded-md focus:ring
                        focus:ring-opacity-75 focus:ring-violet-400
                        dark:border-gray-700 dark:text-gray-800">
                        @error('value')
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
                        Enviar oferta
                    </button>
                </div>
            </form>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModalCreate')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
