<div>
    <button wire:click="showModalCreate()" class="btn btn-warning btn-sm">
        <svg class="w-5 h-5" fill="currentColor" focusable="false" aria-hidden="true" viewBox="0 0 52 52" xmlns="http://www.w3.org/2000/svg">
            <path d="M27.4133467,3.10133815 L32.0133467,18.1013381 C32.2133467,18.7013381 32.8133467,19.0013381 33.4133467,19.0013381 L48.4133467,19.0013381 C49.9133467,19.0013381 50.5133467,21.0013381 49.3133467,21.9013381 L37.1133467,30.9013381 C36.6133467,31.3013381 36.4133467,32.0013381 36.6133467,32.6013381 L42.4133467,48.0013381 C42.8133467,49.4013381 41.3133467,50.6013381 40.1133467,49.7013381 L27.0133467,39.9013381 C26.5133467,39.5013381 25.8133467,39.5013381 25.2133467,39.9013381 L12.0133467,49.7013381 C10.8133467,50.6013381 9.21334668,49.4013381 9.71334668,48.0013381 L15.3133467,32.6013381 C15.5133467,32.0013381 15.3133467,31.3013381 14.8133467,30.9013381 L2.61334668,21.9013381 C1.41334668,21.0013381 2.11334668,19.0013381 3.51334668,19.0013381 L18.5133467,19.0013381 C19.2133467,19.0013381 19.7133467,18.8013381 19.9133467,18.1013381 L24.6133467,3.00133815 C25.0133467,1.60133815 27.0133467,1.70133815 27.4133467,3.10133815 Z M26.0133467,12.8023264 C26,14.1700393 26,33.5426636 26,34.4953918 C26.1865845,34.6476135 28.9331193,36.6890643 34.2396046,40.6197441 C34.9394191,41.144605 35.8141872,40.4447905 35.5809157,39.6283403 L35.5809157,39.6283403 L32.3085327,31.0201416 C31.9597778,30.2501831 32.3085327,29.7487793 32.7398682,29.4849854 L32.7398682,29.4849854 L39.6048489,24.6961622 C40.3046634,24.1713013 39.9547562,23.0049438 39.0799881,23.0049438 L39.0799881,23.0049438 L31.0206299,23.0049438 C30.6707226,23.0049438 29.7518921,22.8880615 29.5025635,21.9888306 L29.5025635,21.9888306 L26.8332347,13.4436151 C26.7175852,13.0388421 26.3602784,12.8204102 26.0133467,12.8023264 Z" />
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
                        <div class="rating rating-lg" >
                            <input type="radio" wire:model="rate" id="rate_1" value="1" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" wire:model="rate" id="rate_2" value="2" class="mask mask-star-2 bg-orange-400"  />
                            <input type="radio" wire:model="rate" id="rate_3" value="3" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" wire:model="rate" id="rate_4" value="4" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" wire:model="rate" id="rate_5" value="5" class="mask mask-star-2 bg-orange-400" checked/>
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
