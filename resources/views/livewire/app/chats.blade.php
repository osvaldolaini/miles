<div>
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    <div  >
        <div class="overflow-x-auto">
            @foreach ($listChats as $chat)
                <div
                    class="stats stats-vertical lg:stats-horizontal shadow-md w-full my-2
                bg-teal-500 text-white px-0 mx-0">
                    <div class="stat px-2">
                        <div class="stat-title text-white">Usuário</div>
                        <div class="stat-title text-white">
                            <x-user-card :user="$chat->user">
                            </x-user-card>
                        </div>
                    </div>
                    <div class="stat px-2">
                        <div class="stat-title dark:text-white">Pedido </div>
                        <div class="stat-title text-lg font-extrabold dark:text-white">
                            R$ {{ $chat->demand->value }} - R$ {{ $chat->demand->value_max }}
                        </div>
                        {{-- <div class="stat-title dark:text-white">Oferta de nº {{ $chat->offer->order }} da fila</div> --}}
                        <div class="stat-value dark:text-white">
                            R$ {{ $chat->offer->value }}
                        </div>
                    </div>

                    <div class="stat px-2">
                        <a href="{{ route('offer.user', [$chat->offer->code]) }}">
                            <div class="stat-title dark:text-white">Última mensagem</div>
                            <div class="stat-actions flex flex-col space-y-2">

                                <div class="chat {{ $chat->user_id == $user_id ? 'chat-end' : 'chat-start' }} ">
                                    <div class="chat-header">
                                        {{ $chat->user_id == $user_id ? 'Eu' : '' }}
                                    </div>
                                    <div
                                        class="chat-bubble {{ $chat->user_id == $user_id ? 'text-white' : 'text-teal-500' }} ">
                                        {{ $chat->status == 1 ? mb_strimwidth($chat->text, 0, 20, '...') : 'Mensagem apagada' }}
                                    </div>
                                </div>

                                <time
                                    class="w-full text-xs opacity-50 text-right justify-end dark:text-white">{{ $chat->send_at }}</time>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

</div>
