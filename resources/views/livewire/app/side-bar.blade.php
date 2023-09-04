<div class="min-h-full p-3 space-y-2 w-60 bg-gray-100
dark:bg-gray-800 dark:text-white text-semibold rounded-lg mb-36">
    <div class="divide-y divide-gray-700">
        <div class="Sidebar">
            <ul class="ul pt-2 pb-4 space-y-1 text-sm">
                {{-- <li class="li dark:bg-gray-800 dark:text-white cursor-pointer hidden sm:block">
                    @livewire('app.search-user')
                </li> --}}
                <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                    <a href="{{ route('app') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                        <span class="span ">
                            <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                viewBox="0 0 24 24" data-testid="HomeIcon">
                                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path>
                            </svg>
                        </span>
                        <span class="span semibold">Home</span>
                    </a>
                </li>
                <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                    <a href="{{ route('chats') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                        <span class="span ">
                            <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                viewBox="0 0 24 24" data-testid="QuestionAnswerIcon">
                                <path
                                    d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z">
                                </path>
                            </svg>
                        </span>
                        <span class="span semibold">Chat</span>
                    </a>
                </li>
                <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                    <a href="{{ route('demand.user') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                        <span class="span ">
                            <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                viewBox="0 0 24 24" data-testid="BookmarkRemoveIcon">
                                <path
                                    d="M21 7h-6V5h6v2zm-2 3.9c-.32.07-.66.1-1 .1-2.76 0-5-2.24-5-5 0-1.13.37-2.16 1-3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V10.9z">
                                </path>
                            </svg>
                        </span>
                        <span class="span semibold">Meus pedidos</span>
                    </a>
                </li>
                <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                    <a href="{{ route('like.demand.user') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                        <span class="span ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="span semibold">Meus favoritos</span>
                    </a>
                </li>
                <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                    <a href="{{ route('offer.list.user') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                        <span class="span ">
                            <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                viewBox="0 0 24 24" data-testid="BookmarkAddIcon">
                                <path
                                    d="M21 7h-2v2h-2V7h-2V5h2V3h2v2h2v2zm-2 14-7-3-7 3V5c0-1.1.9-2 2-2h7c-.63.84-1 1.87-1 3 0 2.76 2.24 5 5 5 .34 0 .68-.03 1-.1V21z">
                                </path>
                            </svg>
                        </span>
                        <span class="span semibold">Minhas ofertas</span>
                    </a>
                </li>
                <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">
                    <a href="{{ route('account.user') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                        <span class="span ">
                            <svg class="w-4 h-4" fill="currentColor" focusable="false" aria-hidden="true"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22,17a4,4,0,1,1-4-4A4,4,0,0,1,22,17ZM21,3H4A2,2,0,0,0,2,5V19a2,2,0,0,0,2,2h9.54A5.99,5.99,0,0,1,22,12.54V8a1,1,0,0,0-1-1H5A1,1,0,0,1,5,5H22V4A1,1,0,0,0,21,3Z" />
                            </svg>
                        </span>
                        <span class="span semibold">Minhas contas</span>
                    </a>
                </li>
                {{-- <li class="li dark:bg-gray-800 dark:text-white cursor-pointer">

                    <a href="{{ route('demand.alerts') }}" class="a flex items-center p-2 space-x-3 rounded-md">
                        @livewire('app.demand-notification-button')

                        <span class="span semibold">Notificações</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
