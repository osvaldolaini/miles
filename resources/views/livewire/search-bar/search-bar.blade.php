<div>
    <div class="flex flex-col items-center justify-between md:flex-row space-x-2">
        <div class="flex w-full">
            <div
                class="text-gray-900 text-sm flex
                    focus:ring-blue-500 block w-full
                    dark:bg-gray-900 dark:placeholder-gray-400
                    dark:text-white dark:focus:ring-blue-500 ">
                <label for="simple-search" class="sr-only">
                    Pesquisar
                </label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-blue-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Pesquisar" wire:model.debounce.500ms="search"
                        class="w-full border-blue-500 py-3 pl-10 text-sm text-gray-900
                            rounded-2xl  focus:ring-primary-500 dark:bg-gray-700
                            dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500" />
                </div>
            </div>
        </div>
        <div
            class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
            <div class="group flex ">
                <button wire:click="showModalCreate()"
                    class="flex items-center justify-center w-1/2 px-5
                        py-3 text-sm tracking-wide text-white transition-colors
                        duration-200 bg-blue-500 rounded-lg sm:w-auto gap-x-2
                        hover:bg-blue-600 dark:border dark:border-gray-100">
                    <svg class="h-4 w-4 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    <span>Novo </span>
                </button>
            </div>
        </div>
    </div>
    <div class="dark:bg-gray-800 my-6 ">
        <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden dark:border dark:border-gray-100  sm:rounded-lg">
                    {{-- <table style="width:100%" class='min-w-full divide-y divide-gray-200 dark:divide-gray-700'> --}}
                        <table class="table table-zebra">
                        <thead class=" dark:bg-gray-800">
                            <tr scope="col"
                                class="py-3.5 px-4 text-xs sm:text-sm font-normal text-left text-gray-500
                                dark:text-gray-400">
                                @if ($showId == 'true')
                                    <th scope="col"
                                        class="py-3.5 px-4 text-xs sm:text-sm font-normal
                                        text-center
                                                text-gray-500 dark:text-gray-400">
                                        Id
                                    </th>
                                @endif
                                @foreach ($columnsNames as $columnName)
                                    @if ($columnName)
                                        <th scope="col"
                                            class="py-3.5 px-4 text-xs sm:text-sm font-normal
                                            text-center
                                                    text-gray-500 dark:text-gray-400">
                                            {{ $columnName }}
                                        </th>
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @if ($dataTable->isEmpty())
                                <tr>
                                    <td colspan="{{ count($columnsNames) }}"
                                        class="py-1.5 px-4 text-xs sm:text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                        Nenhum resultado encontrado.
                                    </td>
                                </tr>
                            @else
                                @php
                                    $columnsNames = array_slice($columnsNames, 0, -1);
                                @endphp
                                @foreach ($dataTable as $data)
                                    <tr>
                                        @foreach ($data->toArray() as $key => $value)
                                            @if ($key == 'id')
                                                @if ($showId == 'true')
                                                    <td
                                                        class="py-1.5 px-4 text-xs sm:text-sm font-normal  text-center text-gray-500 dark:text-gray-400">
                                                        {{ $value }}
                                                    </td>
                                                @endif
                                            @elseif($key == $activeButton)
                                                <td
                                                    class="w-1/6 py-1.5 px-4 text-xs sm:text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                    <livewire:search-bar.toggle-button
                                                        :model="$data"
                                                        field="{{$activeButton}}"
                                                        key="{{$data->id}}"
                                                        width="sm" />
                                                </td>
                                            @else
                                                <td
                                                    class="py-1.5 px-4 text-xs sm:text-sm font-normal  text-center text-gray-500 dark:text-gray-400">
                                                    {{ $value }}
                                                </td>
                                            @endif
                                        @endforeach
                                        @if ($extraButtons)
                                            <td
                                                class="w-1/12 py-1.5 px-4 text-xs sm:text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                <livewire:search-bar.extra-buttons
                                                        :model="$data"
                                                        :buttons="$extraButtons"
                                                        key="{{$data->id}}" />
                                            </td>
                                        @endif
                                        @if ($showButtons)
                                            <td
                                                class="w-1/6 py-1.5 px-4 text-xs sm:text-sm font-normal text-center text-gray-500 dark:text-gray-400">
                                                @livewire('search-bar.actions-buttons', ['search_id' => $data->id], key($data->id))
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="items-center justify-between  py-4">
            {{ $dataTable->links() }}
        </div>
    </div>
</div>
