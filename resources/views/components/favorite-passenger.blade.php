@props(['order' => null, 'favorites' => null])
<div class="w-full col-span-full mb-2">
    <div class="grid grid-cols-3 gap-3 lg:col-span-4 content-around" wire:key="{{ $order }}_favorites">
        <div class="col-span-full sm:col-span-2 my-auto">
            <label for="name" class="text-sm block sm:hidden">
                Passageiro ({{ $order+1 }})
            </label>
            <input wire:model="name.{{$order}}"  type="text"
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
                    CPF
                </label>
                <input wire:model="cpf.{{$order}}" x-ref="cpf" placeholder="CPF"
                    class="w-full rounded-md focus:ring
                focus:ring-opacity-75 focus:ring-violet-400
                dark:border-gray-700 dark:text-gray-800">
                @error('cpf')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            @if ($favorites->count() > 0)
                <div>
                    <button  wire:click.prevent="showFavotitesModel({{$order}})" class="btn btn-square btn-info mt-4 sm:mt-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.71 15.116l3.357-1.658.892.452 2.327 1.178-.56-3.912.708-.707 1.29-1.29-3.235-.576-.445-.915-1.059-2.176L8.4 8.683l-1.005.168-2.098.35 1.975 1.975-.141.99-.422 2.95zM5.2 18a.8.8 0 01-.792-.914l.743-5.203-2.917-2.917a.8.8 0 01.434-1.355l4.398-.733 2.218-4.435a.8.8 0 011.435.008l2.123 4.361 4.498.801a.8.8 0 01.425 1.353l-2.917 2.917.744 5.203a.8.8 0 01-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 015.2 18z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    </div>
    <x-dialog-modal wire:model="showFavotitesModel" class="mt-0">
        <x-slot name="title">Favoritos</x-slot>
        <x-slot name="content">
            <div class="overflow-x-auto">
                <table class="table">
                <tbody>
                    @if ($favorites->count() > 0)
                        @foreach ($favorites as $item)
                            <tr wire:key={{ $item->id }}>
                                <th>
                                <label>
                                    <input wire:click="checkbox({{ $item }})" type="checkbox" class="checkbox" />
                                </label>
                                </th>
                                <td>
                                    <div>
                                    <div class="text-sm opacity-75">Passageiro(a)</div>
                                    <div class="font-bold">{{ $item->name }}</div>
                                    </div>
                                </div>
                                </td>
                                <td>
                                    <div>
                                    <div class="text-sm opacity-75">CPF</div>
                                    <div class="font-bold">{{ $item->cpf }}</div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showFavotitesModel')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
