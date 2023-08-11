<div>
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    <div class="overflow-x-auto">
        @foreach ($offers as $offer)
            <div class="stats bg-gray-200 stats-vertical lg:stats-horizontal shadow-md w-full my-2">
                <div class="stat">
                    <div class="stat-title">Usuário</div>
                    <div class="stat-title">
                        <x-user-card :user="$offer->user">
                        </x-user-card>
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">Oferta </div>
                    <div class="stat-value">
                        R$ {{ $offer->value }}
                    </div>
                    <div class="stat-title">Ordem na fila </div>
                    <div class="stat-value">
                        {{ $offer->order }}ª
                    </div>
                </div>
                <div class="stat">
                    <div class="stat-title">Ações</div>
                    <div class="stat-actions flex flex-col space-y-2">
                        <a class="btn btn-success btn-sm" href="{{ route('offer.user', [$offer->code]) }}">
                            <svg class="w-5 h-5" fill="currentColor" focusable="false" aria-hidden="true"
                                viewBox="0 0 24 24" data-testid="QuestionAnswerIcon">
                                <path
                                    d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z">
                                </path>
                            </svg>
                            Conversar
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('demand.checkout', [$offer->code]) }}">
                            <svg class="w-5 h-5" fill="currentColor" focusable="false" aria-hidden="true"
                                viewBox="0 -64 640 640" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M488 192H336v56c0 39.7-32.3 72-72 72s-72-32.3-72-72V126.4l-64.9 39C107.8 176.9 96 197.8 96 220.2v47.3l-80 46.2C.7 322.5-4.6 342.1 4.3 357.4l80 138.6c8.8 15.3 28.4 20.5 43.7 11.7L231.4 448H368c35.3 0 64-28.7 64-64h16c17.7 0 32-14.3 32-32v-64h8c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm147.7-37.4L555.7 16C546.9.7 527.3-4.5 512 4.3L408.6 64H306.4c-12 0-23.7 3.4-33.9 9.7L239 94.6c-9.4 5.8-15 16.1-15 27.1V248c0 22.1 17.9 40 40 40s40-17.9 40-40v-88h184c30.9 0 56 25.1 56 56v28.5l80-46.2c15.3-8.9 20.5-28.4 11.7-43.7z" />
                            </svg>
                            Finalizar
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
