@props(['data'])
@if ($data)
        <div class="container-fluid rounded-lg shadow-md py-2
            bg-gray-100 dark:bg-gray-900 dark:text-gray-100 mx-2">
            <div class="flex items-center justify-between py-0 px-3">
                <div class="flex items-center space-x-2">
                    @if ($data->user->avatar)
                        <img src="{{ url('storage/profiles/'.$data->user->avatar) }}" alt="sistemilhas-avatar-{{ $data->user->username }}" class="object-cover object-center w-8 h-8 rounded-full shadow-sm dark:bg-gray-500 dark:border-gray-700">
                    @else
                        <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar" class="object-cover object-center w-8 h-8 rounded-full shadow-sm dark:bg-gray-500 dark:border-gray-700">
                    @endif
                    <div class="-space-y-1">
                        <h2 class="text-sm font-semibold leading-none">{{ '@'.$data->user->username }}</h2>
                        <span class="inline-block text-xs leading-none dark:text-gray-400 mb-2">Iniciante</span>
                            <span class="flex items-center leading-none  ml-0
                                justify-center rounded-md bg-red-100
                                px-2.5 py-0.5 text-red-700">
                                <p class="whitespace-nowrap text-xs">Já vendeu 10.5k</p>
                            </span>
                    </div>
                </div>
                <div class="text-right">
                    <h1 class="text-xl font-bold mt-0 pt-0" >{{ milesUnit($data->demand->miles) }}  Milhas</h1>
                    <h2 class="text-lg font-bold mt-0 pt-0" >{{ $data->demand->qtd }} CPF</h2>
                    <h2 class="text-md font-bold mt-0 pt-0" >Valor ofertado R$ {{ number_format($data->value, 2, ',', '.') }}</h2>
                    @if ($data->user->id == Auth::user()->id)
                        <div class="mt-2">
                            <x-app-offer :data='$data'></x-app-demand>
                        </div>
                    @endif
                </div>
            </div>
            <div class="px-3">
                <div class="space-y-3">
                    <p class="text-xs text-right">
                        <span class="text-base font-semibold text-xs">Enviado à </span>{{ timeCreate($data->created_at) }}
                    </p>
                </div>
            </div>
        </div>
@endif


