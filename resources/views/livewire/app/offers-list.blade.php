<div class=" p-3 space-y-2 bg-gray-100
 dark:bg-gray-800 dark:text-white text-semibold rounded-lg">
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th>Usuários</th>
                    <th class="text-center">Ofertas</th>
                    <th class="text-center">Negociar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <!-- row 1 -->
                    <tr class="border-t border-gray-500 dark:border-gray-100">
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="{{ $offer->user->profile_photo_url ? $offer->user->profile_photo_url : 'storage/profiles/avatar.jpg' }}"
                                            alt="sistemilhas-avatar-{{ $offer->user->username }}">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{ $offer->user->name }}</div>
                                    <div class="text-sm opacity-50">@ {{ $offer->user->username }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-outline btn-warning">
                                <svg class="w-5 h-5 " fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 20C4.486 20 0 15.514 0 10S4.486 0 10 0s10 4.486 10 10-4.486 10-10 10zm1-15a1 1 0 10-2 0v.17A3 3 0 007 8c0 1.013.36 1.77 1.025 2.269.54.405 1.215.572 1.666.685l.066.016c.55.138.835.224 1.018.361.085.064.225.182.225.669a1 1 0 01-.984 1 1.611 1.611 0 01-.325-.074 2.533 2.533 0 01-.984-.633 1 1 0 00-1.414 1.414A4.548 4.548 0 009 14.804V15a1 1 0 102 0v-.17A3 3 0 0013 12c0-1.013-.36-1.77-1.025-2.269-.54-.405-1.215-.572-1.666-.685l-.066-.016c-.55-.138-.835-.224-1.018-.361C9.14 8.605 9 8.487 9 8a1 1 0 01.984-1 1.618 1.618 0 01.325.074c.245.081.606.255.984.633a1 1 0 101.414-1.414A4.547 4.547 0 0011 5.196V5z" />
                                </svg>
                                {{ $offer->value }}
                            </button>
                        </td>
                        <th class="text-center">
                            <a class="btn btn-success" href="{{ route('offer.user', [$offer->code]) }}">
                                <svg class="w-5 h-5" fill="currentColor" focusable="false" aria-hidden="true"
                                    viewBox="0 0 24 24" data-testid="QuestionAnswerIcon">
                                    <path
                                        d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z">
                                    </path>
                                </svg>
                                Negociar
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
