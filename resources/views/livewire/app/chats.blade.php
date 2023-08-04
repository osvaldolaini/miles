<div class=" p-3 space-y-2 bg-gray-100
 dark:bg-gray-800 dark:text-white text-semibold rounded-lg">
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th colspan="3">Minhas conversas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listChats as $chat)
                    <tr class="border-t border-gray-500 dark:border-gray-100">
                        <td class="flex items-center space-y-2">
                            <div>
                                <h2 class="flex text-sm font-semibold leading-none items-center my-0 py-0">
                                    <span>Pedido: {{ $chat->demand->milesConvert }}</span>
                                </h2>
                                <span
                                    class="flex items-center leading-none mx-0
                                    justify-center rounded-lg bg-emerald-200
                                    px-2.5 py-0.5 text-emerald-700">
                                    <p class="whitespace-nowrap text-xs">
                                        R$ {{ $chat->demand->value }} - R$ {{ $chat->demand->value_max }}
                                    </p>
                                </span>
                                <h2 class="flex text-sm font-semibold leading-none items-center my-0 py-0">
                                    <span>Oferta: <span
                                        class="flex items-center leading-none mx-0
                                        justify-center rounded-lg bg-emerald-200
                                        px-2.5 py-0.5 text-emerald-700">
                                        <p class="whitespace-nowrap text-xs">
                                            R$ {{ $chat->offer->value }}
                                        </p>
                                    </span></span>
                                </h2>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                @livewire('app.user-card', ['user' => $chat->user], key($chat->user->id))
                            </div>
                        </td>
                        <th class="text-center flex flex-col">
                            <a href="{{ route('offer.user', [$chat->offer->code]) }}">
                                <div class="chat {{ $chat->user_id == $user_id ? 'chat-end' : 'chat-start' }} ">
                                    <div class="chat-header">
                                        {{ $chat->user_id == $user_id ? 'Eu' : '' }}
                                    </div>
                                    <div
                                        class="chat-bubble {{ $chat->user_id == $user_id ? 'text-white' : 'text-teal-500' }} ">
                                        {{ $chat->status == 1 ? $chat->text : 'Mensagem apagada' }} </div>
                                </div>
                            </a>
                            <time class="w-full text-xs opacity-50 text-right justify-end">{{ $chat->send_at }}</time>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
