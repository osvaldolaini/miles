@props(['user' => null])
<div>
    <a class="cursor-pointer" href="{{ route('user.bio', [$user->username]) }}">
        <div class="flex items-center space-x-2" wire:key="{{ $user->id }}-user">
            @if ($user->profile_photo_url)
                <img src="{{ $user->profile_photo_url }}" alt="sistemilhas-avatar-{{ $user->username }}"
                    class="object-cover object-center w-8 h-8 rounded-full shadow-sm dark:bg-gray-500 dark:border-gray-700">
            @else
                <img src="{{ url('storage/profiles/avatar.jpg') }}" alt="sistemilhas-avatar"
                    class="object-cover object-center w-8 h-8 rounded-full shadow-sm dark:bg-gray-500 dark:border-gray-700">
            @endif
            <div>
                <h2 class="flex text-sm font-semibold leading-none items-center my-0 py-0">
                    <span>{{ $user->name }}</span>
                    @if ($user->cpf)
                        <svg class="w-5 h-5 my-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="#068bac"
                                d="M9 12L11 14L15 10M12 3L13.9101 4.87147L16.5 4.20577L17.2184 6.78155L19.7942 7.5L19.1285 10.0899L21 12L19.1285 13.9101L19.7942 16.5L17.2184 17.2184L16.5 19.7942L13.9101 19.1285L12 21L10.0899 19.1285L7.5 19.7942L6.78155 17.2184L4.20577 16.5L4.87147 13.9101L3 12L4.87147 10.0899L4.20577 7.5L6.78155 6.78155L7.5 4.20577L10.0899 4.87147L12 3Z"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    @endif
                </h2>
                <span class="inline-block text-xs leading-none dark:text-gray-400 mb-0 mt-0">
                    {{ '@' . $user->username }}
                </span>
                @if ($user->id != Auth::user()->id && $user->buy > 0)
                    <span
                        class="flex items-center leading-none mx-0
                    justify-center rounded-lg bg-emerald-200
                    px-2.5 py-0.5 text-emerald-700">
                        <p class="whitespace-nowrap text-xs">Comprou {{ $user->buyConvert }}</p>
                    </span>
                @endif
                @if ($user->id != Auth::user()->id && $user->sell > 0)
                    <span
                        class="flex items-center leading-none mx-0
                    justify-center rounded-lg bg-red-200
                    px-2.5 py-0.5 text-red-700">
                        <p class="whitespace-nowrap text-xs">Vendeu {{ $user->sellConvert }}</p>
                    </span>
                @endif
            </div>
        </div>
    </a>
</div>
