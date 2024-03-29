<div>
    @livewire('app.received')
    <div class="w-full p-1 sm:px-2 pt-0 sm:flex sm:space-x-6 dark:bg-gray-900 dark:text-gray-100">
        <div class="bg-white shadow-lg rounded-2xl w-full dark:bg-gray-800">
            <div class="w-full mb-4 rounded-t-lg h-28 bg-teal-500"></div>
            <div class="w-full flex flex-col items-center justify-center p-2 sm:p-8 -mt-28
                sm:-mt-32">
                <span class="relative block">
                    <!-- Open the modal using ID.showModal() method -->
                    <button onclick="my_modal_2.showModal()">
                        @if ($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="sistemilhas-avatar-{{ $user->username }}"
                                class="mx-auto object-cover rounded-full h-28 w-28 sm:h-32 sm:w-32  border-2 border-white dark:border-gray-800">
                        @else
                            <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar"
                                class="mx-auto object-cover rounded-full h-28 w-28 sm:h-32 sm:w-32  border-2 border-white dark:border-gray-800">
                        @endif
                    </button>
                    <dialog id="my_modal_2" class="modal bg-transparent">
                        <form method="dialog" class="modal-box">
                            @if ($user->profile_photo_url)
                                <img src="{{ $user->profile_photo_url }}" alt="sistemilhas-avatar-{{ $user->username }}"
                                    class="mx-auto object-cover rounded-full h-60 w-60 border-2 border-white dark:border-gray-800">
                            @else
                                <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar"
                                    class="mx-auto object-cover rounded-full h-60 w-60 border-2 border-white dark:border-gray-800">
                            @endif
                        </form>

                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                </span>
                <p class="mt-2 text-xl font-medium text-gray-800 dark:text-white">
                    {{ $user->name }} (Id: {{ $user->id }})
                </p>
                <div class="flex space-x-2">
                    <p class="p-2 px-4 text-xs text-white bg-emerald-500 rounded-full">
                        Comprou {{ $user->buyConvert }}
                    </p>
                    <p class="p-2 px-4 text-xs text-white bg-red-500 rounded-full">
                        Vendeu {{ $user->sellConvert }}
                    </p>
                </div>
                {{-- <p class="p-2 px-4 text-xs text-white bg-pink-500 rounded-full">
                Professional
            </p> --}}
                <div class="w-full p-2 mt-4 rounded-lg">
                    <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-200">
                        <p class="flex flex-col text-center ">
                            Membro desde
                            <span class="font-bold text-black dark:text-white">
                                {{ $user->since }} ({{ $user->since() }})
                            </span>
                        </p>
                        <p class="flex flex-col text-center">
                            Pedidos
                            <span class="font-bold text-black dark:text-white">
                                {{ $user->demands->where('status', 3)->count() }} / {{ $user->demands->count() }}
                            </span>
                        </p>
                        <p class="flex flex-col text-center">
                            Ofertas
                            <span class="font-bold text-black dark:text-white">
                                {{ $user->offers->where('status', 3)->count() }} / {{ $user->offers->count() }}
                            </span>
                        </p>
                        <p class="flex flex-col text-center">
                            Avaliações
                            <span class="font-bold text-black dark:text-white">
                                {{ $user->rating }} / 5
                            </span>
                        </p>
                    </div>
                </div>
                <div class="w-full px-2 mt-4 rounded-lg">
                    <div class="flex flex-row items-center text-sm
                text-gray-600 dark:text-gray-200">
                        <p class="text-left">
                            Bio
                        </p>
                    </div>
                </div>
                <div class="w-full px-2 mt-0 rounded-lg">
                    <div class="flex flex-row items-center text-sm
                text-gray-600 dark:text-gray-200">
                        <p class="text-justify font-bold text-black dark:text-white">
                            {{ $user->bio }}
                        </p>
                    </div>
                </div>
            </div>
            <x-section-border />

            <div class="grid grid-cols-2 gap-3">
                @foreach ($user->ratings->sortByDesc('id')->take(10) as $rating)
                    <div wire:click="openReceived({{ $rating->demand->id }})"
                        class="col-span-full sm:col-span-1 bg-white dark:bg-gray-800
                        items-center sm:items-start p-4 cursor-pointer">
                        <div class="flex items-center sm:items-start mt-4">
                            <a href="#" class="relative block">
                                @if ($rating->rated->profile_photo_url)
                                    <img src="{{ $rating->rated->profile_photo_url }}"
                                        alt="sistemilhas-avatar-{{ $rating->rated->username }}"
                                        class="mx-auto object-cover rounded-full h-10 w-10 ">
                                @else
                                    <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar"
                                        class="mx-auto object-cover rounded-full h-10 w-10 ">
                                @endif
                            </a>
                            <div class="flex flex-col justify-between ml-2">
                                <span class="text-sm font-semibold text-indigo-500">
                                    {{ $rating->rated->name }}
                                </span>
                                <span class="flex items-center text-xs dark:text-gray-400">
                                    Avaliado em {{ $rating->since }}
                                </span>
                                <span class="flex items-center text-xs dark:text-gray-400">
                                    <div class="flex space-x-1">
                                        <button type="button" title="Rate 1 stars" aria-label="Rate 1 stars">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3 {{ ($rating->rate >= 1 ? 'text-yellow-500' :'text-gray-600') }}">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" title="Rate 2 stars" aria-label="Rate 2 stars">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3 {{ ($rating->rate >= 2 ? 'text-yellow-500' :'text-gray-600') }}">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" title="Rate 3 stars" aria-label="Rate 3 stars">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3 {{ ($rating->rate >= 3 ? 'text-yellow-500' :'text-gray-600') }}">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" title="Rate 4 stars" aria-label="Rate 4 stars">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3 {{ ($rating->rate >= 4 ? 'text-yellow-500' :'text-gray-600') }}">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" title="Rate 5 stars" aria-label="Rate 5 stars">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3 {{ ($rating->rate == 5 ? 'text-yellow-500' :'text-gray-600') }}">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    {{-- @for ($i = 0; $i < $rating->rate; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.71 15.116l3.357-1.658.892.452 2.327 1.178-.56-3.912.708-.707 1.29-1.29-3.235-.576-.445-.915-1.059-2.176L8.4 8.683l-1.005.168-2.098.35 1.975 1.975-.141.99-.422 2.95zM5.2 18a.8.8 0 01-.792-.914l.743-5.203-2.917-2.917a.8.8 0 01.434-1.355l4.398-.733 2.218-4.435a.8.8 0 011.435.008l2.123 4.361 4.498.801a.8.8 0 01.425 1.353l-2.917 2.917.744 5.203a.8.8 0 01-1.154.828l-4.382-2.22-4.502 2.223A.792.792 0 015.2 18z"
                                                fill="currentColor" />
                                        </svg>
                                    @endfor --}}
                                </span>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-white">
                            <span class="text-lg font-bold text-indigo-500">
                                “
                            </span>
                            {{ $rating->text }}
                            <span class="text-lg font-bold text-indigo-500">
                                ”
                            </span>
                        </p>

                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
