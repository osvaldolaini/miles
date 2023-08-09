<div class=" p-3 space-y-2 bg-gray-100
 dark:bg-gray-800 dark:text-white text-semibold rounded-lg">

 <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
 <div class="overflow-x-auto">
    @foreach ($listChats as $chat)
    <a href="{{ route('offer.user', [$chat->offer->code]) }}">
        <div class="stats bg-gray-200 stats-vertical lg:stats-horizontal shadow-md w-full my-2">
            <div class="stat">
                <div class="stat-title">Usuário</div>
                <div class="stat-title">
                    @livewire('app.user-card', ['user' => $chat->user], key($chat->user->id))
                </div>
            </div>
            <div class="stat">
                <div class="stat-title">Pedido </div>
                <div class="stat-title text-lg font-extrabold">
                    R$ {{ $chat->demand->value }} - R$ {{ $chat->demand->value_max }}
                </div>
                <div class="stat-title">Oferta de nº {{ $chat->offer->order }} da fila</div>
                <div class="stat-value">
                    R$ {{ $chat->offer->value }}
                </div>
            </div>
            <div class="stat">
                <div class="stat-title">Última mensagem</div>
                <div class="stat-actions flex flex-col space-y-2">

                        <div class="chat {{ $chat->user_id == $user_id ? 'chat-end' : 'chat-start' }} ">
                            <div class="chat-header">
                                {{ $chat->user_id == $user_id ? 'Eu' : '' }}
                            </div>
                            <div
                                class="chat-bubble {{ $chat->user_id == $user_id ? 'text-white' : 'text-teal-500' }} ">
                                {{ $chat->status == 1 ? $chat->text : 'Mensagem apagada' }} </div>
                        </div>

                    <time class="w-full text-xs opacity-50 text-right justify-end">{{ $chat->send_at }}</time>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>

</div>
