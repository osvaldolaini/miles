<div>
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    <div>
        <div class="overflow-x-auto">
            <div class="max-w-2xl overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{ $account->name }}
                    </h3>
                    <p class="max-w-2xl mt-1 text-sm text-gray-500">
                        {{ $account->category->title }}
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <div class="container max-w-3xl px-4 mx-auto sm:px-8">
                        <div class="py-2">
                            <div class="px-4 py-2 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                    <table class="min-w-full leading-normal">
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
                                                {{-- <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                status
                            </th> --}}
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
                                                            <td
                                                                class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                                <x-user-card :user="$offer->user">
                                                                </x-user-card>
                                                            </td>
                                                            {{-- <td
                                                                class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                                <span
                                                                    class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                                                    <span aria-hidden="true"
                                                                        class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                                                    </span>
                                                                    <span class="relative">
                                                                        active
                                                                    </span>
                                                                </span>
                                                            </td> --}}
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

        </div>

    </div>
