<div>
    <x-app-breadcrumb>{{ $breadcrumb }}</x-app-breadcrumb>
    <div  >
        <div class="overflow-x-auto">
            @foreach ($offers as $offer)
                <div
                    class="stats stats-vertical lg:stats-horizontal shadow-md w-full my-2
                bg-teal-500 text-white px-0 mx-0">
                <div class="stat px-2">
                    <div class="stat-title font-bold">Dados do pedido</div>
                    <div class="stat-title text-lg font-extrabold">
                        R$ {{ $offer->demand->value }} - R$ {{ $offer->demand->value_max }}
                    </div>
                    <div class="stat-actions">
                        <div class="stats p-0 m-0 bg-transparent">
                            <div class="stat p-0 px-2">
                                <x-user-card :user="$offer->demand->user" notdetail="true">
                                </x-user-card>
                            </div>
                            <div class="stat p-0 px-2 text-sm justify-end">
                                <h1 class="font-bold mt-0 pt-0">{{ $offer->demand->milesConvert }} Milhas</h1>
                                <h2 class="font-bold mt-0 pt-0">{{ $offer->demand->qtd }} CPF</h2>
                                <h2 class="font-bold mt-0 pt-0 text-red-500">{{ $offer->demand->category->title }}</h2>
                                <h2 class="font-bold mt-0 pt-0 text-red-500">{{ $offer->demand->created_at }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="stat px-2">
                        <div class="stat-title">Passageiro </div>
                        <div class="stat-title text-sm font-extrabold">
                            João
                        </div>
                        <div class="stat-title text-sm font-extrabold">
                            CPF
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

</div>

