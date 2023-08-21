<div>
    @livewire('app.received')
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    <div CLASS="mt-4 w-full">
        <div class="overflow-x-auto">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{ $account->name }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ $account->category->title }}
                    </p>
                </div>
                <div class="border-t border-gray-200 w-full">
                    <div class="container px-2 mx-auto  w-full overflow-x-auto">
                        <div class="inline-block w-full overflow-x-auto rounded-lg shadow">
                            <table class="w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Passageiro
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Data
                                        </th>
                                        <th scope="col"
                                            class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Comprador
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Detalhes
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($this->offers)
                                        @foreach ($this->offers as $offer)
                                            @php $passengers = $offer->demand->passengers->pluck('name','cpf'); @endphp
                                            @foreach ($passengers as $key => $value)
                                                <tr>
                                                    <td
                                                        class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:text-gray-900">
                                                        {{ $value }} <br> ({{ $key }})
                                                    </td>
                                                    <td
                                                        class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:text-gray-900">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $offer->since }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                        <x-user-card :user="$offer->demand->user">
                                                        </x-user-card>
                                                    </td>
                                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                        <button type='button' wire:click="openReceived({{ $offer->demand->id }})"
                                                            class="bg-gray-500 cursor-pointer
                                                            hover:bg-gray-900 border-2 border-gray-500
                                                            active:bg-gray-300 text-white text-xs
                                                            font-bold uppercase px-6 py-2 rounded-full
                                                            shadow hover:shadow-md outline-none focus:outline-none
                                                            mr-0 mb-0 ml-2 m2-4 ease-linear transition-all
                                                            duration-150">
                                                            Detalhes
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
