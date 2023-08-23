<div class="h-5/6 sm:h-96 px-2 sm:px-0">
    <div wire:model="chats" wire:poll.10s
        class="w-full p-2 space-y-2 mt-0 flex flex-col-reverse
        lg:mt-0 bg-gray-100 dark:bg-gray-900 dark:border-gray-100
        rounded-t-lg shadow-lg overflow-y-scroll h-3/4">
        @if ($chats->count() == 0)
            Envie uma Mensagem
        @endif
        @foreach ($chats as $chat)
            @if ($chat->user_id == $user_id)
                <div class="chat chat-end">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            @if ($chat->user->profile_photo_url)
                                <img src="{{ $chat->user->profile_photo_url }}"
                                    alt="sistemilhas-avatar-{{ $chat->user->username }}">
                            @else
                                <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar">
                            @endif
                        </div>
                    </div>
                    <div class="chat-header">
                        Eu
                        <time class="text-xs opacity-50">{{ $chat->send_at }}</time>
                    </div>
                    <div class="chat-bubble dark:chat-bubble-accent dark:text-white text-teal-500">
                        {{ $chat->status == 1 ? $chat->text : 'Mensagem apagada' }}
                    </div>
                </div>
            @else
                <div class="chat chat-start">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            @if ($chat->user->profile_photo_url)
                                <img src="{{ $chat->user->profile_photo_url }}"
                                    alt="sistemilhas-avatar-{{ $chat->user->username }}">
                            @else
                                <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar">
                            @endif
                        </div>
                    </div>
                    <div class="chat-header">
                        {{ $chat->user->name }}
                        <time class="text-xs opacity-50">{{ $chat->send_at }}</time>
                    </div>
                    <div class="chat-bubble dark:chat-bubble-info dark:text-white text-teal-500">
                        {{ $chat->status == 1 ? $chat->text : 'Mensagem apagada' }}</div>
                    {{-- <div class="chat-footer opacity-50">
                        {{ now() }}
                    </div> --}}
                </div>
            @endif
        @endforeach
    </div>
    <div
        class="w-full p-2
        bg-gray-800 dark:border-gray-800 dark:border-gray-100
            rounded-b-lg shadow-lg h-44">

        <div class="px-4 rounded-t-lg bg-gray-800">
            <label for="comment" class="sr-only">Sua mensagem</label>
            <textarea id="comment" rows="4" wire:model="text" wire:keydown.enter="sendMessage()"
                class="w-full px-0  text-teal-500  border-0 text-lg sm:text-sm
                    bg-gray-800 focus:ring-0 dark:placeholder-teal-400"
                placeholder="Escreva sua mensagem..." required>
            </textarea>

        </div>

        <div class="flex items-center justify-between px-3 py-1 border-t dark:border-gray-600">
            <button type="submit" wire:click="sendMessage()"
                class="bg-teal-500
                    hover:bg-gray-900 border-2 border-teal-500
                    active:bg-teal-300 text-white text-xs
                    font-bold uppercase px-6 py-2.5 rounded-full
                    shadow hover:shadow-md outline-none focus:outline-none
                    ml-3 mx-4  ease-linear transition-all
                    duration-150">
                Enviar
            </button>
        </div>
    </div>

</div>
