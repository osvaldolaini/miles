<div>
    <button type="button" wire:click="openFilter"
        class="flex text-gray-900 bg-transparent dark:text-white mr-2 py-auto">
        <svg class="h-4 w-4 mt-1 mr-2 dark:text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M19 4V10M19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14M19 10C20.1046 10 21 10.8954 21 12C21 13.1046 20.1046 14 19 14M19 14V20M12 4V16M12 16C10.8954 16 10 16.8954 10 18C10 19.1046 10.8954 20 12 20C13.1046 20 14 19.1046 14 18C14 16.8954 13.1046 16 12 16ZM5 8V20M5 8C6.10457 8 7 7.10457 7 6C7 4.89543 6.10457 4 5 4C3.89543 4 3 4.89543 3 6C3 7.10457 3.89543 8 5 8Z"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg> Filtros
    </button>
    <x-dialog-modal wire:model="showFilterModal" class="mt-0 dark:bg-gray-900">
        <x-slot name="title">Filtros</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="applayfilters()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-1 sm:gap-6 sm:mb-5 ">
                    <div class="flex flex-col justify-between flex-1">
                        <div class="space-y-6 text-black dark:text-gray-900">
                            <!-- Categories -->
                            <div class="space-y-2">
                                <h6 class="text-base font-medium ">
                                    Planos
                                </h6>
                                <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 sm:gap-2 ">
                                    @foreach ($categories as $category)
                                        <div class="flex items-center col-span-1">
                                            <input wire:model="categoriesSelecteds" type="checkbox"

                                                id="cat_{{$category->id}}" value="{{ $category->id }}"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded
                                                    text-primary-600 focus:ring-primary-500
                                                    dark:focus:ring-primary-600 dark:ring-offset-gray-800
                                                    focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                            <label for="cat_{{$category->id}}"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                {{ $category->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Prices -->
                            <div class="space-y-2">
                                <h6 class="text-base font-medium text-black dark:text-white">
                                    Preços
                                </h6>
                                <div class="flex items-center justify-between col-span-2 space-x-3">
                                    <div class="w-full">
                                        <label for="min-experience-input"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Valor min
                                        </label>
                                        <div class="col-span-1" x-data x-init="Inputmask({
                                            'mask': '99,90'
                                        }).mask($refs.value)">
                                            <input x-ref="value" wire:model="min_val" type="text" min="1"
                                                max="10000"
                                                class="bg-gray-50 border border-gray-300 text-gray-900
                                                rounded-lg focus:ring-primary-500 focus:border-primary-500 block
                                                w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                >
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <label for="price-to"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Valor max
                                        </label>
                                        <div class="col-span-1" x-data x-init="Inputmask({
                                            'mask': '99,90'
                                        }).mask($refs.value)">
                                            <input x-ref="value" wire:model="max_val" type="text" min="1"
                                                max="10000"
                                                class="bg-gray-50 border border-gray-300 text-gray-900
                                                rounded-lg focus:ring-primary-500 focus:border-primary-500 block
                                                w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </x-slot>
        <x-slot name="footer">
            <button type="submit" wire:click="applayfilters()"
                class="bg-teal-500
                        hover:bg-gray-900 border-2 border-teal-500
                        active:bg-teal-300 text-white text-xs
                        font-bold uppercase rounded-full
                        shadow hover:shadow-md outline-none focus:outline-none
                        ease-linear transition-all duration-150
                        mr-0 lg:mb-0 ml-3 mx-4 px-2 sm:px-6 py-2.5">
                Aplicar filtros
            </button>
            <button type="submit" wire:click="$toggle('showFilterModal')"
                class="inline-flex border-2 border-teal-500 bg-gray-900 text-white
                        active:bg-teal-300 hover:bg-teal-300 text-xs font-bold uppercase px-6
                        rounded-full shadow hover:shadow-md outline-none focus:outline-none  ease-linear
                        transition-all duration-150
                        mr-0 lg:mb-0 ml-3 mx-4 sm:px-6 py-2.5">
                Fechar
            </button>
        </x-slot>
    </x-dialog-modal>
</div>
