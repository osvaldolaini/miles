<div class="w-full p-1 sm:px-8 pt-0 sm:flex sm:space-x-6 dark:bg-gray-900 dark:text-gray-100">
    <div class="bg-white shadow-lg rounded-2xl w-full dark:bg-gray-800">
        <div class="w-full mb-4 rounded-t-lg h-28 bg-teal-500" ></div>
        <div class="flex flex-col items-center justify-center p-2 sm:p-8 -mt-16 sm:-mt-20">
            <span class="relative block">
                @if ($user->profile_photo_url)
                    <img src="{{ $user->profile_photo_url }}" alt="sistemilhas-avatar-{{ $user->username }}"
                        class="mx-auto object-cover rounded-full h-16 w-16 sm:h-20 sm:w-20  border-2 border-white dark:border-gray-800">
                @else
                    <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar"
                        class="mx-auto object-cover rounded-full h-16 w-16 sm:h-20 sm:w-20  border-2 border-white dark:border-gray-800">
                @endif
            </span>
            <p class="mt-2 text-xl font-medium text-gray-800 dark:text-white">
                {{ $user->name }}
            </p>
            <div class="flex space-x-2">
                @if ($user->id != Auth::user()->id && $user->buy > 0)
                    <p class="p-2 px-4 text-xs text-white bg-emerald-500 rounded-full">
                        Comprou {{ $user->buyConvert }}
                    </p>
                @endif
                @if ($user->id != Auth::user()->id && $user->sell > 0)
                    <p class="p-2 px-4 text-xs text-white bg-red-500 rounded-full">
                        Vendeu {{ $user->sellConvert }}
                    </p>
                @endif
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
                            {{ $user->demands->where('status',3)->count() }} /  {{ $user->demands->count() }}
                        </span>
                    </p>
                    <p class="flex flex-col text-center">
                        Ofertas
                        <span class="font-bold text-black dark:text-white">
                            {{ $user->offers->where('status',3)->count() }} /  {{ $user->offers->count() }}
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
    </div>

</div>
