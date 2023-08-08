<div class="relative inline-block">
    @if ($offers->count() == 0)
        <div class="flex justify-center items-center space-x-3 ">
            <div class="flex flex-wrap items-center pt-3 pb-1 ">
                <div class="flex items-center space-x-2">
                    <span class="text-sm">Nenhuma pessoa
                        <span class="font-semibold">fez oferta</span>
                    </span>
                </div>
            </div>
        </div>
    @else
        <details class="dropdown dropdown-bottom sm:dropdown-right dark:bg-gray-900">
            <summary class="m-1 inline-flex cursor-pointer">
                <div class="flex flex-wrap items-center pt-3 pb-1 ">
                    <div class="flex items-center space-x-2">
                        @php
                            $i = 0;
                        @endphp
                        <div class="flex -space-x-4">
                            @foreach ($offers->take(3) as $offer)
                                @php $i += 1; @endphp
                                <img alt="sistemilhas-avatar-{{ $offer->username }}"
                                    class="w-6 h-6 border rounded-full dark:bg-gray-500 dark:border-gray-800"
                                    src="{{ $offer->user->profile_photo_url ? url($offer->user->profile_photo_url) : url('storage/profiles/avatar.jpg') }}">
                                @if ($i == 3)
                                @break
                            @endif
                        @endforeach
                    </div>
                    <span class="text-sm">{{ $offers->count() > 1 ? 'Foram feitas' : 'Foi feita' }}
                        <span class="font-semibold"> {{ $offers->count() }} oferta</span>
                    </span>
                </div>
        </summary>
        <div
            class="dropdown-content z-[1] ml-5 menu py-2 px-1 shadow bg-base-100 rounded-box
             absolute right-0 z-20 w-64 mt-2 overflow-hidden bg-white rounded-md shadow-lg sm:w-96
             dark:bg-gray-900">
            <div class="py-2">
                @foreach ($offers->take(5) as $offer)
                    @if ($linkOffer == true)
                        <a href="{{ route('offer.user', [$offer->code]) }}"
                            class="flex justify-between text-left items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                            <div >
                                @livewire('app.user-card', ['user' => $offer->user], key($offer->user->id))
                            </div>
                            <button class="btn btn-outline btn-success btn-sm">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.486 20 0 15.514 0 10S4.486 0 10 0s10 4.486 10 10-4.486 10-10 10zm1-15a1 1 0 10-2 0v.17A3 3 0 007 8c0 1.013.36 1.77 1.025 2.269.54.405 1.215.572 1.666.685l.066.016c.55.138.835.224 1.018.361.085.064.225.182.225.669a1 1 0 01-.984 1 1.611 1.611 0 01-.325-.074 2.533 2.533 0 01-.984-.633 1 1 0 00-1.414 1.414A4.548 4.548 0 009 14.804V15a1 1 0 102 0v-.17A3 3 0 0013 12c0-1.013-.36-1.77-1.025-2.269-.54-.405-1.215-.572-1.666-.685l-.066-.016c-.55-.138-.835-.224-1.018-.361C9.14 8.605 9 8.487 9 8a1 1 0 01.984-1 1.618 1.618 0 01.325.074c.245.081.606.255.984.633a1 1 0 101.414-1.414A4.547 4.547 0 0011 5.196V5z" />
                                </svg>

                                {{ $offer->value }}
                            </button>
                        </a>
                    @else
                        <span
                            class="flex justify-between text-left items-center px-4 py-3 -mx-2 transition-colors duration-300 transform border-b border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                            <div >
                                @livewire('app.user-card', ['user' => $offer->user], key($offer->user->id))
                            </div>
                            <button class="btn btn-outline btn-success btn-sm">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.486 20 0 15.514 0 10S4.486 0 10 0s10 4.486 10 10-4.486 10-10 10zm1-15a1 1 0 10-2 0v.17A3 3 0 007 8c0 1.013.36 1.77 1.025 2.269.54.405 1.215.572 1.666.685l.066.016c.55.138.835.224 1.018.361.085.064.225.182.225.669a1 1 0 01-.984 1 1.611 1.611 0 01-.325-.074 2.533 2.533 0 01-.984-.633 1 1 0 00-1.414 1.414A4.548 4.548 0 009 14.804V15a1 1 0 102 0v-.17A3 3 0 0013 12c0-1.013-.36-1.77-1.025-2.269-.54-.405-1.215-.572-1.666-.685l-.066-.016c-.55-.138-.835-.224-1.018-.361C9.14 8.605 9 8.487 9 8a1 1 0 01.984-1 1.618 1.618 0 01.325.074c.245.081.606.255.984.633a1 1 0 101.414-1.414A4.547 4.547 0 0011 5.196V5z" />
                                </svg>

                                {{ $offer->value }}
                            </button>
                        </span>
                    @endif
                @endforeach
            </div>
            @if ($linkOffer == true)
                <a href="{{ route('all.offers.demand', [$demand->code]) }}"
                    class="block py-2 font-bold text-center text-white bg-gray-800 dark:bg-gray-700 hover:underline">Ver
                    lista completa ({{ $offers->count() }})</a>
            @endif

        </div>
    </details>

@endif

</div>
