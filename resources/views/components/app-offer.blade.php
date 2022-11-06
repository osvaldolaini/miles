@props(['data'])
@if ($data)
    <div x-data="{ open: false }" class="relative flex justify-center">
        <button @click="open = !open" class="bg-teal-500
        hover:bg-gray-900 border-2 border-teal-500
        active:bg-teal-300 text-white text-xs
        font-bold uppercase px-6 py-2.5 rounded-full
        shadow hover:shadow-md outline-none focus:outline-none
        mr-0 lg:mb-0 ml-3 mx-4  ease-linear transition-all
        duration-150" >
            FAZER OFERTA
        </button>

        <div  x-show.transition="open" x-on:click.away="open = false"
            x-transition:enter="transition duration-300 ease-out"
            x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
            x-transition:leave="transition duration-150 ease-in"
            x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
            x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
            class="fixed inset-0 z-10 overflow-y-auto"
            aria-labelledby="modal-title" role="dialog" aria-modal="false" id="offerModal"
        >
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden
                text-left align-bottom transition-all transform bg-white rounded-lg
                shadow-xl dark:bg-gray-900 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div>
                        <div class="mt-4 text-center">
                            <h3 class="font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">
                                Faça sua oferta
                            </h3>

                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                Após fazer a sua oferta você irá entrar na fila por order de valor e chegada respectivamente.
                            </p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <form action="minhas-ofertas" method="POST" id="form_{{ $data->id }}" class="container flex flex-col mx-auto  ng-untouched ng-pristine ng-valid">
                            <label class="text-sm text-gray-700 dark:text-gray-200" for="share link">Oferta (R$)
                                <span class="flex items-center leading-none ml-0
                                justify-center rounded-md bg-red-100
                                px-2.5 py-0.5 text-red-700">
                                <p class="whitespace-nowrap text-xs">Valor máximo {{ money($data->value_max) }}</p>
                            </span></label>
                                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-4">
                                    <div class="col-span-full ">
                                        <input value="{{ old('value') }}" maxlength="7" onkeypress="masks(this,maskMoney)"  name="value" required type="text" placeholder="Valor"
                                        class="mb-2 mt-2 w-full rounded-md focus:ring focus:ring-opacity-75
                                        focus:ring-violet-400 dark:border-gray-700 dark:text-gray-900">
                                        <input type="hidden" name="demand_id" value="{{ $data->id }}">
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-4">
                                    <div class="col-span-full ">
                                        <div class="flex space-x-2 justify-center py-1" >
                                            <button type='submit' onclick="offer({{$data->id}})"
                                            data-mdb-ripple='true'
                                            data-mdb-ripple-color='light'
                                                    class='mb-2 mt-1.5 w-full inline-block px-6 py-3 cursor-pointer
                                                    bg-blue-600 text-white font-medium text-xs leading-normal text-center
                                                    uppercase rounded shadow-md font-bold
                                                    hover:py-2.5 hover:border-2 hover:border-blue-600 hover:bg-white hover:text-blue-600
                                                    focus:border-blue-600 focus:text-white focus:outline-none focus:outline-none focus:ring-0
                                                    active:bg-white active:text-white active:shadow-lg transition duration-150 ease-in-out'
                                                    >
                                            ENVIAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
