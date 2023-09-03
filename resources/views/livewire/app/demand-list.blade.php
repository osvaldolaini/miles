<div wire:init="loadPosts">
    @livewire('app.message-alert')
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>

    @if ($readyToLoad == false)
        <x-skeleton></x-skeleton>
    @else
        @if ($demands->count() == 0)
            <section class="flex items-center h-full sm:p-16 dark:bg-gray-900 dark:text-gray-100">
                <div
                    class="container flex flex-col items-center justify-center px-5 mx-auto my-8 space-y-8 text-center sm:max-w-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-40 h-40 dark:text-white">

                        <path fill="currentColor"
                            d="M15.6579 14.3242C15.8127 13.94 15.6267 13.5031 15.2424 13.3483C14.8582 13.1936 14.4213 13.3796 14.2665 13.7638L15.6579 14.3242ZM14.0782 15.25L14.552 15.8314L14.5548 15.8291L14.0782 15.25ZM9.82624 15.219L9.3407 15.7906L9.34406 15.7935L9.82624 15.219ZM9.66243 13.7312C9.51398 13.3445 9.08015 13.1514 8.69346 13.2998C8.30676 13.4483 8.11362 13.8821 8.26206 14.2688L9.66243 13.7312ZM14.2761 11.3027C14.4433 11.6817 14.886 11.8534 15.265 11.6862C15.644 11.519 15.8156 11.0762 15.6484 10.6973L14.2761 11.3027ZM12.2761 10.6973C12.1089 11.0762 12.2805 11.519 12.6595 11.6862C13.0385 11.8534 13.4812 11.6817 13.6484 11.3027L12.2761 10.6973ZM10.2761 11.3027C10.4433 11.6817 10.886 11.8534 11.265 11.6862C11.644 11.519 11.8156 11.0762 11.6484 10.6973L10.2761 11.3027ZM8.27606 10.6973C8.10886 11.0762 8.28054 11.519 8.65951 11.6862C9.03848 11.8534 9.48123 11.6817 9.64843 11.3027L8.27606 10.6973ZM15.946 7.18459C16.2656 7.44815 16.7383 7.40278 17.0018 7.08324C17.2654 6.7637 17.22 6.291 16.9005 6.02743L15.946 7.18459ZM7.28618 6.82506L7.79059 7.38011L7.28618 6.82506ZM6.19669 15.8996L6.81814 15.4797L6.19669 15.8996ZM15.0222 18.2752L14.6955 17.6001L15.0222 18.2752ZM19.3501 9.65317C19.2248 9.25836 18.8032 9.03986 18.4084 9.16514C18.0136 9.29042 17.7951 9.71203 17.9204 10.1068L19.3501 9.65317ZM14.2665 13.7638C14.1243 14.117 13.8957 14.4289 13.6017 14.6709L14.5548 15.8291C15.0426 15.4277 15.4219 14.9102 15.6579 14.3242L14.2665 13.7638ZM13.6045 14.6686C12.6424 15.4525 11.259 15.4424 10.3084 14.6446L9.34406 15.7935C10.846 17.0542 13.0318 17.0701 14.552 15.8314L13.6045 14.6686ZM10.3118 14.6474C10.022 14.4012 9.79869 14.0862 9.66243 13.7312L8.26206 14.2688C8.48842 14.8584 8.85933 15.3817 9.34071 15.7906L10.3118 14.6474ZM15.6484 10.6973C15.3537 10.0292 14.6924 9.5982 13.9622 9.5982V11.0982C14.0981 11.0982 14.2212 11.1784 14.2761 11.3027L15.6484 10.6973ZM13.9622 9.5982C13.2321 9.5982 12.5708 10.0292 12.2761 10.6973L13.6484 11.3027C13.7033 11.1784 13.8264 11.0982 13.9622 11.0982V9.5982ZM11.6484 10.6973C11.3537 10.0292 10.6924 9.5982 9.96224 9.5982V11.0982C10.0981 11.0982 10.2212 11.1784 10.2761 11.3027L11.6484 10.6973ZM9.96224 9.5982C9.23209 9.5982 8.57079 10.0292 8.27606 10.6973L9.64843 11.3027C9.70328 11.1784 9.82636 11.0982 9.96224 11.0982V9.5982ZM16.9005 6.02743C13.936 3.58227 9.62564 3.68561 6.78178 6.27002L7.79059 7.38011C10.0827 5.29713 13.5567 5.21385 15.946 7.18459L16.9005 6.02743ZM6.78178 6.27002C3.93791 8.85443 3.42395 13.1353 5.57523 16.3195L6.81814 15.4797C5.08426 12.9134 5.4985 9.46308 7.79059 7.38011L6.78178 6.27002ZM5.57523 16.3195C7.72651 19.5036 11.8899 20.6243 15.3489 18.9503L14.6955 17.6001C11.9077 18.9493 8.55203 18.046 6.81814 15.4797L5.57523 16.3195ZM15.3489 18.9503C18.8079 17.2764 20.5124 13.3159 19.3501 9.65317L17.9204 10.1068C18.8571 13.059 17.4834 16.251 14.6955 17.6001L15.3489 18.9503Z" />
                        <path class="stroke-teal-500 fill-teal-500" fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.3762 9.393C19.169 9.60879 18.9157 9.77494 18.6352 9.879C17.9049 10.1477 17.0847 9.95673 16.5482 9.393C15.8174 8.62465 15.7645 7.4352 16.4242 6.605C16.4636 6.55633 16.5049 6.50933 16.5482 6.464L17.9622 5L19.3762 6.464C20.1576 7.28401 20.1576 8.57299 19.3762 9.393V9.393Z"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-3xl">Infelizmente nenhum pedido foi encontrado.</p>
                    <div class="flex items-center mx-auto sm:hidden">
                        <a href="{{ route('demand') }}"
                            class="bg-teal-500
                        hover:bg-gray-900 border-2 border-teal-500
                        active:bg-teal-300 text-white text-xs font-bold uppercase px-6 py-2.5
                        rounded-full shadow hover:shadow-md outline-none focus:outline-none
                        lg:mr-1 lg:mb-0 ml-3 mb-4 ease-linear transition-all duration-150">
                            FAZER PEDIDO <span class="fa-solid fa-plus"></span>
                        </a>
                    </div>
                </div>
            </section>
        @endif
        @foreach ($demands as $item)
            <div wire:key="demand_{{ $item->id }}" @if ($loop->last) id="last_record"
                wire:loading.delay.class="opacity-50" @endif
                class="container-fluid rounded-lg shadow-md py-2
                    mb-4 bg-teal-500 text-white mt-2">
                <div class="flex items-center justify-between py-0 px-3 ">
                    <div>
                        <x-user-card :user="$item->user">
                        </x-user-card>
                    </div>
                    <div class="text-right">
                        <h1 class="text-xl font-bold mt-0 pt-0">{{ $item->milesDemand }} Milhas</h1>
                        <h2 class="text-lg font-bold mt-0 pt-0">
                            @if ($item->reUse($item->account_categorie_id) != 0)
                                @if ($item->reUse($item->account_categorie_id)['qtd'] != 0)
                                <div class="dropdown dropdown-bottom dropdown-end">
                                    <label tabindex="0">
                                        <div class="cursor-pointer container-fluid mr-3">
                                            <div
                                                class="inline-flex flex-row items-center sm:border
                                                sm:border-gray-700 gap-2 h-6 p-1 bg-transparent
                                                rounded-[30px] text-sm tracking-[.00714em] text-gray-700">
                                                <svg class="w-6 h-6 sm:w-4 sm:h-4" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none">
                                                    <path fill="currentColor" fill-rule="evenodd"
                                                        d="M10 3a7 7 0 100 14 7 7 0 000-14zm-9 7a9 9 0 1118 0 9 9 0 01-18 0zm8-4a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm.01 8a1 1 0 102 0V9a1 1 0 10-2 0v5z" />
                                                </svg>
                                                <span class="hidden sm:block">Detalhes</span>
                                            </div>
                                        </div>
                                    </label>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 text-left
                                    shadow bg-white rounded-box w-52 text-gray-900">
                                    @if ($item->reUse($item->account_categorie_id)['qtd'] > 1)
                                        {{ $item->reUse($item->account_categorie_id)['qtd'] }}
                                        CPF dessa oferta já foram utilizados na carteira
                                        {{ $item->account->name }}:
                                        <ul>
                                            @foreach ($item->reUse($item->account_categorie_id)['cpfs'] as $cpf)
                                            <li> - &nbsp;
                                                {{ $cpf }}
                                            </li>
                                            @endforeach

                                        </ul>
                                    @else
                                        {{ $item->reUse($item->account_categorie_id)['qtd'] }}
                                        CPF dessa oferta já foi utilizado  na carteira
                                        {{ $item->account->name }}:
                                        <ul>
                                            @foreach ($item->reUse($item->account_categorie_id)['cpfs'] as $cpf)
                                            <li> - &nbsp;
                                                {{ $cpf }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    </ul>
                                </div>
                            @endif
                        @endif
                            {{ $item->qtd }} CPF</h2>
                        <h2 class="text-md font-bold mt-0 pt-0">Valor R$ {{ $item->value }}</h2>
                        <h2 class="text-md font-bold mt-0 pt-0 text-red-500">{{ $item->category->title }}</h2>
                        @if ($item->user->id == Auth::user()->id)
                            @if ($item->user->cpf != null)
                                <div class="mt-0 pt-0">
                                    <button type='button' wire:click="showDeleteModal({{ $item->id }})"
                                        class="bg-red-500
                                                hover:bg-gray-900 border-2 border-red-500
                                                active:bg-red-300 text-white text-xs
                                                font-bold uppercase px-6 py-2.5 rounded-full
                                                shadow hover:shadow-md outline-none focus:outline-none
                                                mr-0 mb-0 ml-3 mx-4  ease-linear transition-all
                                                duration-150">
                                        Excluir <span class="fa-solid fa-trash"></span>
                                    </button>
                                </div>
                            @endif
                        @else
                            <div class="mt-2">
                                @livewire('app.offer', ['demand' => $item], key($item->id))
                            </div>
                        @endif
                    </div>
                </div>
                <div class="px-3">
                    <div class="flex items-center">

                            @if ($item->user->id != Auth::user()->id)
                                @livewire('app.demand-likes', ['demands' => $item], key($item->id))
                            @endif
                            @livewire('app.offers-to-demand', ['demand' => $item, 'linkOffer' => false], key($item->id))

                    </div>

                    <div class="space-y-3">
                        <p class="flex text-xs justify-end">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.06152 12C5.55362 8.05369 8.92001 5 12.9996 5C17.4179 5 20.9996 8.58172 20.9996 13C20.9996 17.4183 17.4179 21 12.9996 21H8M13 13V9M11 3H15M3 15H8M5 18H10"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span class="text-base font-semibold text-xs mr-1">
                                Publicado há
                            </span> {{ $item->timeCreate }}
                        </p>
                    </div>
                </div>

            </div>
        @endforeach
    @endif
    {{-- MODAL DELETE --}}
    <x-confirmation-modal wire:model="showDeleteModal">
        <x-slot name="title">Excluir pedido</x-slot>
        <x-slot name="content">
            <h2 class="h2">Deseja realmente excluir o pedido?</h2>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showDeleteModal')" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-danger-button wire:click.prevent="delete()" wire.loading.attr='disable'>
                Excluir
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
    <script>
        const lastRecord = document.getElementById('last_record');
        const options = {
            root: null,
            threshold: 1,
            rootMargin: '0px'
        }
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    @this.takeMore()
                }
            });
        });
        observer.observe(lastRecord);
    </script>
</div>
