<div class="relative inline-block ">
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
        <div class="dropdown dropdown-bottom sm:dropdown-right ">
            <label tabindex="0" class="m-1 inline-flex cursor-pointer">
                <div class="flex flex-wrap items-center pt-3 pb-1 ">
                    <div class="flex items-center space-x-2">
                        @php
                            $i = 0;
                        @endphp
                        <div class="flex -space-x-4">
                            @foreach ($offers->take(3) as $offer)
                                @php $i += 1; @endphp
                                <a class="cursor-pointer" href="{{ route('user.bio', [$offer->user->username]) }}">
                                    <img alt="sistemilhas-avatar-{{ $offer->user->username }}"
                                        class="w-6 h-6 border rounded-full"
                                        src="{{ $offer->user->profile_photo_url ? url($offer->user->profile_photo_url) : url('storage/profiles/avatar.jpg') }}">
                                </a>
                                @if ($i == 3)
                                @break;
                            @endif
                        @endforeach
                    </div>
                    <span class="text-sm">{{ $offers->count() > 1 ? 'Foram feitas' : 'Foi feita' }}
                        <span class="font-semibold"> {{ $offers->count() }} oferta</span>
                    </span>
                </div>
            </label>
            <div tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                <div class="py-2">
                    @foreach ($offers->take(3) as $offer)
                        @if ($linkOffer == true)
                            <div
                                class="stats stats-vertical rounded-none lg:stats-horizontal w-full
                                        p-0.5 bg-transparent border-b-2 sm:border-none">
                                <div class="stat p-0.5 border-none">
                                    <div class="stat-title">
                                        <x-user-card :user="$offer->user">
                                        </x-user-card>
                                    </div>
                                </div>
                                <div class="stat p-1 border-none sm:text-right">
                                    <div class="stat-title py-0 my-0">
                                        <button class="btn btn-outline btn-success btn-sm">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10 20C4.486 20 0 15.514 0 10S4.486 0 10 0s10 4.486 10 10-4.486 10-10 10zm1-15a1 1 0 10-2 0v.17A3 3 0 007 8c0 1.013.36 1.77 1.025 2.269.54.405 1.215.572 1.666.685l.066.016c.55.138.835.224 1.018.361.085.064.225.182.225.669a1 1 0 01-.984 1 1.611 1.611 0 01-.325-.074 2.533 2.533 0 01-.984-.633 1 1 0 00-1.414 1.414A4.548 4.548 0 009 14.804V15a1 1 0 102 0v-.17A3 3 0 0013 12c0-1.013-.36-1.77-1.025-2.269-.54-.405-1.215-.572-1.666-.685l-.066-.016c-.55-.138-.835-.224-1.018-.361C9.14 8.605 9 8.487 9 8a1 1 0 01.984-1 1.618 1.618 0 01.325.074c.245.081.606.255.984.633a1 1 0 101.414-1.414A4.547 4.547 0 0011 5.196V5z" />
                                            </svg>
                                            {{ $offer->value }}
                                        </button>
                                    </div>
                                    <div class="stat-actions py-0 my-1">
                                        <div class="tooltip tooltip-top p-0" data-tip="Negociar">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('demand.checkout', [$offer->code]) }}">
                                                <svg class="w-5 h-5" fill="currentColor" focusable="false"
                                                    aria-hidden="true" viewBox="0 -64 640 640"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="tooltip tooltip-top p-0" data-tip="Conversar">
                                            <a class="btn btn-success btn-sm"
                                                href="{{ route('offer.user', [$offer->code]) }}">
                                                <svg class="w-5 h-5" fill="currentColor" focusable="false"
                                                    aria-hidden="true" viewBox="0 0 24 24"
                                                    data-testid="QuestionAnswerIcon">
                                                    <path
                                                        d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <span
                                class="flex justify-between text-left items-center px-4 py-3
                                            -mx-2 transition-colors duration-300 transform border-b
                                            border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 dark:border-gray-700">
                                <div>
                                    <x-user-card :user="$offer->user">
                                    </x-user-card>
                                </div>
                                <button class="btn btn-outline btn-success btn-sm">
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
        </div>

    @endif
</div>
