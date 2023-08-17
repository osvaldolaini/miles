<div class="p-3 space-y-2 bg-gray-100
 dark:bg-gray-900 dark:text-white text-semibold rounded-lg ">
 @livewire('app.message-alert')
    <div >
        <livewire:search-bar.search-bar
            {{-- REQUIRED --}}  model="App\Models\Account" {{-- Model principal --}}
            {{-- REQUIRED --}}  modelId="accounts.id" {{-- Ex: 'table.id' or 'id' --}}
            {{-- REQUIRED --}}  showId="false" {{-- 'true' or 'false' --}}
            {{-- REQUIRED --}}  columnsInclude="accounts.name,account_categories.title" {{-- Colunas incluidas --}}
            {{-- REQUIRED --}}  columnsNames="Conta,Plano" {{-- Cabeçalho da tabela --}}
            {{-- REQUIRED --}}  searchable="accounts.name,account_categories.title" {{-- Colunas pesquisadas no banco de dados --}}
            {{-- OK --}} customSearch="" {{-- Colunas personalizadas, customizar no model --}}
            {{-- OK --}} activeButton="status" {{-- Toogle de ativar e desativear registro --}}
            {{-- OK --}} relationTables="account_categories,account_categories.id,accounts.account_categorie_id" {{-- Relacionamentos ( table , key , foreingKey ) --}}
            {{-- OK --}} showButtons="Ações" {{-- Botões --}}
            {{-- OK --}} sort="accounts.status , desc | accounts.name , asc" {{-- Ordenação da tabela --}}
            {{-- OK --}} paginate="6" {{-- Qtd de registros por página --}}
            {{-- OK --}} extraButtons="account.passengers,code,Passageiros" {{-- route,id,model --}}
            {{-- OK --}} foreingKey=""
        />
    {{-- MODAL DELETE --}}
    <x-confirmation-modal wire:model="showJetModal">
        <x-slot name="title">Excluir registro</x-slot>
        <x-slot name="content">
            <h2 class="h2">Deseja realmente excluir o registro?</h2>
            <p>Não será possível reverter esta ação!</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showJetModal')" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click.prevent="delete({{ $registerId }})" wire.loading.attr='disable'>
                Apagar registro
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>

    {{-- MODAL CREATE --}}
    <x-dialog-modal wire:model="showModalCreate">
        <x-slot name="title">Nova conta</x-slot>
        <x-slot name="content">
            <form action="#" wire:submit.prevent="store()" wire.loading.attr='disable'>
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Nome
                        </label>
                        <input type="text" wire:model="name" name="name" id="name"  placeholder="Título"
                        required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="account_categorie_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Plano
                        </label>
                        <select wire:model="account_categorie_id" name="account_categorie_id" id="account_categorie_id"
                        placeholder="Plano"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}" >{{ $plan->title }}</option>
                            @endforeach
                        </select>
                        @error('account_categorie_id') <span class="error">{{ $message }}</span> @enderror
                    </div>

                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit" class="text-white
                    bg-blue-700 hover:bg-blue-800
                    focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5
                    text-center dark:bg-blue-600 dark:hover:bg-blue-700
                    dark:focus:ring-blue-800">
                        Salvar
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
    {{-- MODAL UPDATE --}}
    <x-dialog-modal wire:model="showModalEdit">
        <x-slot name="title">Editar</x-slot>
        <x-slot name="content">
            <form wire:submit.prevent="update">
                <div class="grid gap-4 mb-1 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Nome
                        </label>
                        <input type="text" wire:model="name" name="name" id="name"  placeholder="Título"
                        required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="account_categorie_id" class="block text-sm font-medium text-gray-900 dark:text-white">
                            *Plano
                        </label>
                        <select wire:model="account_categorie_id" name="account_categorie_id" id="account_categorie_id"
                        placeholder="Plano"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="">Selecione uma opção</option>
                            @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}" >{{ $plan->title }}</option>
                            @endforeach
                        </select>
                        @error('account_categorie_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex items-end space-x-4">
                    <button type="submit" class="text-white
                    bg-blue-700 hover:bg-blue-800
                    focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm px-5 py-2.5
                    text-center dark:bg-blue-600 dark:hover:bg-blue-700
                    dark:focus:ring-blue-800">
                        Atualizar
                    </button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-primary-button wire:click="$toggle('showModalEdit')" class="mx-2">
                Fechar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>

</div>
