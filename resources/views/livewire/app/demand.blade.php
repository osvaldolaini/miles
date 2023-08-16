<div>
    @livewire('app.message-alert')
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    <div class="w-full space-y-2 my-3 ">
        <div class="w-full p-2 space-y-2 mt-5 lg:mt-0 bg-gray-100 dark:border-gray-800 dark:border-gray-100 rounded-lg shadow-lg">
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md  dark:bg-gray-800">
                    <div class="grid grid-cols-8 gap-3 col-span-full lg:col-span-4">
                        <div class="col-span-full sm:col-span-4"
                        x-data x-init="Inputmask({
                            'mask': '999.999.999,99'
                        }).mask($refs.miles)">
                            <label for="miles" class="text-sm">
                                Quantidade de Milhas
                            </label>
                            <input  x-ref="miles" wire:model="miles" required type="text" maxlength="10" placeholder="Milhas"
                                class="w-full rounded-md focus:ring
                            focus:ring-opacity-75 focus:ring-violet-400
                            dark:border-gray-700 dark:text-gray-800">
                            @error('miles')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-full sm:col-span-4">
                            <label for="qtd" class="text-sm">
                                Quantidade de CPF
                            </label>
                            <input wire:model="qtd" required type="number" maxlength="2"
                                placeholder="Quantidade de CPF"
                                class="w-full rounded-md focus:ring
                            focus:ring-opacity-75 focus:ring-violet-400
                            dark:border-gray-700 dark:text-gray-800">
                            @error('qtd')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-full sm:col-span-4">
                            <label for="account_categorie_id" class="text-sm">
                                Plano
                            </label>
                            <select wire:model="account_categorie_id" name="account_categorie_id" id="account_categorie_id"
                        placeholder="Plano"
                        class="w-full rounded-md focus:ring
                        focus:ring-opacity-75 focus:ring-violet-400
                        dark:border-gray-700 dark:text-gray-800">
                            <option value="">Selecione um plano</option>
                            @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}" >{{ $plan->title }}</option>
                            @endforeach
                        </select>
                            @error('account_categorie_id')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-full sm:col-span-2" x-data x-init="Inputmask({
                            'mask': '9[9],90'
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
                        <div class="col-span-full sm:col-span-2" x-data x-init="Inputmask({
                            'mask': '9[9],90'
                        }).mask($refs.value_max)">
                            <label for="value_max" class="text-sm">Valor máximo</label>
                            <input x-ref="value_max" wire:model="value_max" required type="text" maxlength="7" placeholder="Valor"
                                class="w-full rounded-md focus:ring
                            focus:ring-opacity-75 focus:ring-violet-400
                            dark:border-gray-700 dark:text-gray-800">
                            @error('value_max')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-full ">
                            <h2 class="text-sm">Duração do pedido</label>
                        </div>
                        <div class="col-span-full sm:col-span-4">
                            <input type="radio" wire:model="end_date"
                                value="{{ date('Y-m-d H:i:s', strtotime('+30 minutes')) }}" id="free_thirty_hour"
                                class="peer hidden" checked/>
                            <label for="free_thirty_hour"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">30 min</div>
                                    <div class="w-full">Free</div>
                                </div>

                            </label>
                        </div>
                        <div class="col-span-full sm:col-span-4">
                            <input type="radio" wire:model="end_date"
                                value="{{ date('Y-m-d H:i:s', strtotime('+1 hour')) }}" id="free_one_hour"
                                class="peer hidden" />
                            <label for="free_one_hour"
                                class="inline-flex items-center justify-between w-full p-5
                                text-gray-500 bg-white border border-gray-200 rounded-lg
                                cursor-pointer dark:hover:text-gray-300 dark:border-gray-700
                                dark:peer-checked:text-blue-500 peer-checked:border-blue-600
                                peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100
                                dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700
                                ">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">1 hora</div>
                                    <div class="w-full">Free</div>
                                </div>
                            </label>
                        </div>
                        <div class="col-span-full sm:col-span-4">
                            <input type="radio" wire:model="end_date"
                                value="{{ date('Y-m-d H:i:s', strtotime('+2 hours')) }}" id="free_two_hour"
                                class="peer hidden" />
                            <label for="free_two_hour"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">2 horas</div>
                                    <div class="w-full">Free</div>
                                </div>
                            </label>
                        </div>
                        <div class="col-span-full sm:col-span-4" >
                            <input type="radio" wire:model="end_date"
                                value="{{ date('Y-m-d H:i:s', strtotime('+24 hours')) }}" id="plus_one_day"
                                class="peer hidden" />
                            <label for="plus_one_day"
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">1 dia</div>
                                    <div class="w-full">Plano plus</div>
                                </div>
                                <svg class="w-10 h-10 ml-3" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 9.37589C11.1926 9.40108 10.0016 9.73666 10 10.6874C9.99825 11.7002 11 11.9999 12 11.9999C13 11.9999 14 12.2311 14 13.3124C14 14.125 13.0064 14.4815 12 14.5994M12 9.37589C12.6851 9.37133 13.5 9.37589 14 9.49991M12 9.37589L12 8M12 14.5994C11.2 14.5994 11 14.6249 10 14.4999M12 14.5994V16M16.3287 4.75855C17.0676 4.77963 17.8001 5.07212 18.364 5.636C18.9278 6.19989 19.2203 6.9324 19.2414 7.67121C19.2623 8.40232 19.2727 8.76787 19.2942 8.85296C19.3401 9.0351 19.2867 8.90625 19.383 9.06752C19.428 9.14286 19.6792 9.40876 20.1814 9.94045C20.6889 10.4778 21 11.2026 21 12C21 12.7974 20.6889 13.5222 20.1814 14.0595C19.6792 14.5912 19.428 14.8571 19.383 14.9325C19.2867 15.0937 19.3401 14.9649 19.2942 15.147C19.2727 15.2321 19.2623 15.5977 19.2414 16.3288C19.2203 17.0676 18.9278 17.8001 18.364 18.364C17.8001 18.9279 17.0676 19.2204 16.3287 19.2414C15.5976 19.2623 15.2321 19.2727 15.147 19.2942C14.9649 19.3401 15.0937 19.2868 14.9325 19.3831C14.8571 19.4281 14.5912 19.6792 14.0595 20.1814C13.5222 20.6889 12.7974 21 12 21C11.2026 21 10.4778 20.6889 9.94047 20.1814C9.40874 19.6792 9.14287 19.4281 9.06753 19.3831C8.90626 19.2868 9.0351 19.3401 8.85296 19.2942C8.76788 19.2727 8.40225 19.2623 7.67121 19.2414C6.93238 19.2204 6.19986 18.9279 5.63597 18.364C5.07207 17.8001 4.77959 17.0676 4.75852 16.3287C4.73766 15.5976 4.72724 15.2321 4.70578 15.147C4.65985 14.9649 4.71322 15.0937 4.61691 14.9324C4.57192 14.8571 4.32082 14.5912 3.81862 14.0595C3.31113 13.5222 3 12.7974 3 12C3 11.2026 3.31113 10.4778 3.81862 9.94048C4.32082 9.40876 4.57192 9.14289 4.61691 9.06755C4.71322 8.90628 4.65985 9.03512 4.70578 8.85299C4.72724 8.7679 4.73766 8.40235 4.75852 7.67126C4.77959 6.93243 5.07207 6.1999 5.63597 5.636C6.19986 5.07211 6.93238 4.77963 7.67121 4.75855C8.40232 4.73769 8.76788 4.72727 8.85296 4.70581C9.0351 4.65988 8.90626 4.71325 9.06753 4.61694C9.14287 4.57195 9.40876 4.32082 9.94047 3.81863C10.4778 3.31113 11.2026 3 12 3C12.7974 3 13.5222 3.31114 14.0595 3.81864C14.5913 4.32084 14.8571 4.57194 14.9325 4.61693C15.0937 4.71324 14.9649 4.65988 15.147 4.70581C15.2321 4.72726 15.5976 4.73769 16.3287 4.75855Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                            </label>
                        </div>
                    </div>
                </fieldset>
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
    </div>

</div>
