<div>
    <button wire:click="showModalCreate()" class="btn btn-info btn-sm">
        <svg class="w-5 h-5" fill="currentColor" focusable="false" aria-hidden="true" viewBox="0 -64 640 640"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z" />
        </svg>
        Avaliar
    </button>
    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showModalCreate" class="mt-0">
        <x-slot name="title">Avaliar</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-1 sm:gap-6 sm:mb-5">
                    <div class="col-span-1">
                        <div class="rating rating-lg">
                            <input type="radio" name="rate" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" name="rate" class="mask mask-star-2 bg-orange-400" checked />
                            <input type="radio" name="rate" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" name="rate" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" name="rate" class="mask mask-star-2 bg-orange-400" />
                        </div>
                    </div>
                    <div class="col-span-1">
                        <textarea wire:model="text" maxlength="255"
                        class="w-full rounded-md focus:ring
                        focus:ring-opacity-75 focus:ring-violet-400
                        dark:border-gray-700 dark:text-gray-800"
                         cols="30" rows="10"></textarea>
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
                        Enviar avaliação
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
